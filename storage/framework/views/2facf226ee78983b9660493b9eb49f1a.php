

<?php $__env->startSection('title', 'Client Ledger | Ac Info'); ?>


<?php $__env->startSection('style'); ?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('admin/dashboard')); ?>">Home</a></li>
                <li class="breadcrumb-item">Clinets</li>
                
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Client Ledger</h5>
                        

                        <!-- Table with stripped rows -->
                        <table class="table display" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col" style="text-align: right;">Amount</th>
                                    <th scope="col" style="text-align: right;">Statement</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($items->id); ?></td>
                                        <td><?php echo e($items->name); ?></td>
                                        <td><?php echo e($items->mobile); ?></td>
                                        <td style="text-align: right">
                                            <?php
                                                $total = DB::table('client_ledger')
                                                    ->where('client_id', $items->id)
                                                    ->sum('amount');
                                                echo number_format((float) $total, 2, '.', '');
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(url('admin/client/statement/' . $items->id)); ?>"
                                                class="link-primary float-end ">Statement</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                    ],
                    "pageLength": 50,

                    "aaSorting": [
                        [3, 'asc']
                    ],
                });
            });
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carac\resources\views/admin/viewclient.blade.php ENDPATH**/ ?>