<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ClientModel;
use App\Models\ClientLedgerModel;

class AuthController extends Controller
{
    public function login()
    {       
        if (!empty(Auth::check())) {
            return redirect('admin/dashboard');
        }
        return view('admin.login');
    }
    public function logout(Request $request): RedirectResponse
        {
            Session::flush();
            
            Auth::logout();

            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            return redirect('/admin');
        }

    public function authlogin(Request $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password], true)) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Email or password is incorrect');
        }
    }
    public function dashboard()
    {
        $data['totaldues'] = DB::table('client_ledger')->sum('amount');
        $data['totalclient'] = DB::table('clients')->count();

        return view('admin.dashboard',$data);
    }

    public function client(Request $req)
    {
        if ($req->isMethod('POST'))
        {
            $req->validate([
                
                'name' => 'required',
                'mobile_number' => 'required|numeric',
                'address' => 'required',
            ]);

            $ClientModel = new ClientModel;
            $ClientModel->name = $req->name;
            $ClientModel->mobile = $req->mobile_number;
            $ClientModel->address = $req->address;
            $ClientModel->created_by = Auth::user()->name;
            
            $ClientModel->save();
            $lastid = $ClientModel->id;
  
        return back()->with('success', ' Client Ledger Created Successfully: ' .$lastid);
        }

        return view('admin.client');
    }
    public function viewclient()
    {
        $data = DB::table('clients')->get();
       
        return view('admin.viewclient',compact('data'));
    }

    public function paymentreceipt(Request $req)
    {
        if ($req->isMethod('POST'))
        {
            $req->validate([
                
                'client_name' => 'required',
                'paymentMode' => 'required',
                'txn_date' => 'required',
                'amount' => 'required',
                'remarks' => 'required',
            ]);

            $ClientLedgerModel = new ClientLedgerModel;
            $ClientLedgerModel->client_id = $req->client_name;
            $ClientLedgerModel->payment_by = $req->paymentMode;
            $ClientLedgerModel->txn_date = $req->txn_date;
            $ClientLedgerModel->amount = $req->amount;
            $ClientLedgerModel->particular = $req->remarks;
            $ClientLedgerModel->entry_by = Auth::user()->name;
            
            $ClientLedgerModel->save();
            $lastid = $ClientLedgerModel->id;
  
        return back()->with('success', ' Payment Reciept Successfully txn id is :  ' .$lastid);
        }

        $data['clientlist'] = DB::table('clients')
        ->select('id', 'name')
        ->orderBy('name', 'asc')
        ->get();

        $data['pay_mode'] = DB::table('payment_type')
        ->select('id', 'payment_mode')
        ->orderBy('payment_mode', 'asc')
        ->get();

        return view('admin.payment-reciept',$data);
    }
    public function payment(Request $req)
    {
        if ($req->isMethod('POST'))
        {
            $req->validate([
                
                'client_name' => 'required',
                'paymentMode' => 'required',
                'txn_date' => 'required',
                'amount' => 'required',
                'remarks' => 'required',
            ]);

            $ClientLedgerModel = new ClientLedgerModel;
            $ClientLedgerModel->client_id = $req->client_name;
            $ClientLedgerModel->payment_by = $req->paymentMode;
            $ClientLedgerModel->txn_date = $req->txn_date;
            $ClientLedgerModel->amount = -$req->amount;
            $ClientLedgerModel->particular = $req->remarks;
            $ClientLedgerModel->entry_by = Auth::user()->name;
            
            $ClientLedgerModel->save();
            $lastid = $ClientLedgerModel->id;
  
        return back()->with('success', ' Payment Reciept Successfully txn id is :  ' .$lastid);
        }

        $data['clientlist'] = DB::table('clients')
        ->select('id', 'name')
        ->orderBy('name', 'asc')
        ->get();

        $data['pay_mode'] = DB::table('payment_type')
        ->select('id', 'payment_mode')
        ->orderBy('payment_mode', 'asc')
        ->get();

        return view('admin.payment',$data);
    }

    public function clientstatement($id)
    {
        try {

            $data['getRecords'] = ClientLedgerModel::getRecord($id);
            return view('admin.client-statement', $data);

        }
            
            catch (\Exception  $e) 
            {
                return 'hello';
            }
        }
    

    public function paymenttxn(Request $req)
    {
        if ($req->isMethod('POST'))
        {
            $req->validate([
                
                'client_name' => 'required',
                'paymentMode' => 'required',
                'txn_date' => 'required',
                'amount' => 'required',
                'remarks' => 'required',
                'client_name_debit' => 'required',
            ]);

             $payment_type = DB::table('payment_type')
                            ->where('id', $req->paymentMode )
                            ->first()->Payment_mode;
            
            $clients = DB::table('clients')
                            ->where('id', $req->client_name )
                            ->first()->name;

            $clients1 = DB::table('clients')
                            ->where('id', $req->client_name_debit )
                            ->first()->name;
            

            $ClientLedgerModel = new ClientLedgerModel;
            $ClientLedgerModel->client_id = $req->client_name_debit;
            $ClientLedgerModel->txn_from = $clients;
            $ClientLedgerModel->payment_by = $req->paymentMode;
            $ClientLedgerModel->txn_date = $req->txn_date;
            $ClientLedgerModel->amount = -$req->amount;
            $ClientLedgerModel->particular = 'Reciept - '. $payment_type ."-". $req->remarks ;
            $ClientLedgerModel->entry_by = Auth::user()->name;
            
            $ClientLedgerModel->save();
            $lastid = $ClientLedgerModel->id;

            if ($lastid)
            {
            $ClientLedgerModel = new ClientLedgerModel;
            $ClientLedgerModel->client_id = $req->client_name;
            $ClientLedgerModel->txn_from = $clients1;
            $ClientLedgerModel->payment_by = $req->paymentMode;
            $ClientLedgerModel->txn_date = $req->txn_date;
            $ClientLedgerModel->amount = $req->amount;
            $ClientLedgerModel->particular = 'Payment - '. $payment_type ."-". $req->remarks ;
            $ClientLedgerModel->entry_by = Auth::user()->name;
            
            $ClientLedgerModel->save();
            $lastid1 = $ClientLedgerModel->id;
            }
  
        return back()->with('success', ' Payment Reciept Successfully txn id is :  ' .$lastid1);
        }

        $data['clientlist'] = DB::table('clients')
        ->select('id', 'name')
        ->orderBy('name', 'asc')
        ->get();

        $data['pay_mode'] = DB::table('payment_type')
        ->select('id', 'payment_mode')
        ->orderBy('payment_mode', 'asc')
        ->get();

        return view('admin.paymenttxn',$data);
    }
}
