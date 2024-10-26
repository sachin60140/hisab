

<?php $__env->startSection('title', 'Reciept | Ac Info'); ?>


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
                
                <li class="breadcrumb-item active">Reciept</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-6 mx-auto">
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
                        <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                            <?php echo e(Session::get('success')); ?>

                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
        
                    <?php if(Session::has('error')): ?>
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                            <?php echo e(Session::get('error')); ?>

                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card">
                    <div class="card-body bg-success bg-opacity-75">
                        <h5 class="card-title text-center text-white">Reciept Details</h5>
        
                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="<?php echo e(route('receipt')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="empname" class="form-label text-white"><strong>Name</strong> </label>
                                <select class="form-select" name="client_name" id="client_name" autofocus>
                                    <option value="" selected >Select Client Ledger...</option>
                                    <?php $__currentLoopData = $clientlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clients): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option <?php echo e(old('client_name')==$clients->id ? 'selected' : ''); ?> value="<?php echo e($clients->id); ?>"><?php echo e($clients->name); ?></option>
                                    

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="paymentMode" class="form-label text-white"><strong>Payment Mode</strong></label>
                                <select class="form-select" name="paymentMode" >
                                    <option value="" selected>Select Payment Mode...</option>
                                    <?php $__currentLoopData = $pay_mode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('paymentMode')==$items->id ? 'selected' : ''); ?> value="<?php echo e($items->id); ?>"><?php echo e($items->payment_mode); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="amount" class="form-label text-white"><strong>Txn Date</strong></label>
                                <span class="text-danger" id="txn_date"></span>
                                <input type="date" class="form-control" name="txn_date" value="<?php echo e(old('txn_date')); ?>">
                            </div>
                            
                            <div class="col-md-12">
                                <label for="amount" class="form-label text-white"><strong>Amount</strong></label>
                                <span class="text-danger" id="amount"></span>
                                <input type="number" min="0.00" max="500000.00" step="any" class="form-control" name="amount" value="<?php echo e(old('amount')); ?>">
                            </div>

                            <div class="col-md-12">
                                <label for="remarks" class="form-label text-white"><strong>Remarks</strong></label>
                                <input type="text" class="form-control" name="remarks" value="<?php echo e(old('remarks')); ?>" >
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
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carac\resources\views/admin/payment-reciept.blade.php ENDPATH**/ ?>