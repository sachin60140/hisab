

<?php $__env->startSection('title', 'Payment Reciept | Ac Info'); ?>


<?php $__env->startSection('style'); ?>

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('admin/dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Payment</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if(Session::has('success')): ?>
                        <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                            role="alert">
                            <?php echo e(Session::get('success')); ?>

                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(Session::has('error')): ?>
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert">
                            <?php echo e(Session::get('error')); ?>

                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"><strong>Payment Entry</strong></h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="<?php echo e(route('paymenttxn')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="empname" class="form-label "><strong>Debit Ledger</strong> </label>
                                <select class="form-select" name="client_name_debit" id="client_name_debit" autofocus>
                                    <option value="" selected>Select Debit Account...</option>
                                    <?php $__currentLoopData = $clientlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clients): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(old('client_name_debit') == $clients->id ? 'selected' : ''); ?>

                                            value="<?php echo e($clients->id); ?>"><?php echo e($clients->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="paymentMode" class="form-label"><strong>Payment Mode</strong></label>
                                <select class="form-select" name="paymentMode">
                                    <option value="" selected>Select Payment Mode...</option>
                                    <?php $__currentLoopData = $pay_mode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(old('paymentMode') == $items->id ? 'selected' : ''); ?>

                                            value="<?php echo e($items->id); ?>"><?php echo e($items->payment_mode); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="empname" class="form-label"><strong>Credit Ledger</strong> </label>
                                <select class="form-select" name="client_name" id="client_name" autofocus>
                                    <option value="" selected>Select Credit Ledger...</option>
                                    <?php $__currentLoopData = $clientlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clients): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(old('client_name') == $clients->id ? 'selected' : ''); ?>

                                            value="<?php echo e($clients->id); ?>"><?php echo e($clients->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="amount" class="form-label "><strong>Txn Date</strong></label>
                                <span class="text-danger" id="txn_date"></span>
                                <input type="date" class="form-control" name="txn_date" value="<?php echo e(old('txn_date')); ?>">
                            </div>

                            <div class="col-md-12">
                                <label for="amount" class="form-label "><strong>Amount</strong></label>
                                <span class="text-danger" id="amount"></span>
                                <input type="number" min="0.00" max="500000.00" step="any" class="form-control"
                                    name="amount" value="<?php echo e(old('amount')); ?>">
                            </div>

                            <div class="col-md-12">
                                <label for="remarks" class="form-label "><strong>Remarks</strong></label>
                                <input type="text" class="form-control" name="remarks" value="<?php echo e(old('remarks')); ?>">
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
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
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
    
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carac\resources\views/admin/paymenttxn.blade.php ENDPATH**/ ?>