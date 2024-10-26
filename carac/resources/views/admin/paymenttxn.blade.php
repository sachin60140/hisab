@extends('admin.layouts.app')

@section('title', 'Payment Reciept | Ac Info')


@section('style')

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>



@endsection

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Payment</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"><strong>Payment Entry</strong></h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{ route('paymenttxn') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="empname" class="form-label "><strong>Debit Ledger</strong> </label>
                                <select class="form-select" name="client_name_debit" id="client_name_debit" autofocus>
                                    <option value="" selected>Select Debit Account...</option>
                                    @foreach ($clientlist as $clients)
                                        <option {{ old('client_name_debit') == $clients->id ? 'selected' : '' }}
                                            value="{{ $clients->id }}">{{ $clients->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="paymentMode" class="form-label"><strong>Payment Mode</strong></label>
                                <select class="form-select" name="paymentMode">
                                    <option value="" selected>Select Payment Mode...</option>
                                    @foreach ($pay_mode as $items)
                                        <option {{ old('paymentMode') == $items->id ? 'selected' : '' }}
                                            value="{{ $items->id }}">{{ $items->payment_mode }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="empname" class="form-label"><strong>Credit Ledger</strong> </label>
                                <select class="form-select" name="client_name" id="client_name" autofocus>
                                    <option value="" selected>Select Credit Ledger...</option>
                                    @foreach ($clientlist as $clients)
                                        <option {{ old('client_name') == $clients->id ? 'selected' : '' }}
                                            value="{{ $clients->id }}">{{ $clients->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="amount" class="form-label "><strong>Txn Date</strong></label>
                                <span class="text-danger" id="txn_date"></span>
                                <input type="date" class="form-control" name="txn_date" value="{{ old('txn_date') }}">
                            </div>

                            <div class="col-md-12">
                                <label for="amount" class="form-label "><strong>Amount</strong></label>
                                <span class="text-danger" id="amount"></span>
                                <input type="number" min="0.00" max="500000.00" step="any" class="form-control"
                                    name="amount" value="{{ old('amount') }}">
                            </div>

                            <div class="col-md-12">
                                <label for="remarks" class="form-label "><strong>Remarks</strong></label>
                                <input type="text" class="form-control" name="remarks" value="{{ old('remarks') }}">
                            </div>


                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        </div>
    @endsection

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
    <script>
        $(function() {

             $("#client_name_debit").change(function() {
                var text1 =  ( $('option:selected', this).text() );
            });
           
            $("#client_name").change(function() {
                var text2 =  ( $('option:selected', this).text() );               
            });
            
        });

    </script>
    
    @endsection
