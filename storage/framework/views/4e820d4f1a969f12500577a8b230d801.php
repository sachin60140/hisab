<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> <?php echo $__env->yieldContent('title'); ?></title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo e(url('assets/img/favicon.png')); ?>" rel="icon">
  <link href="<?php echo e(url('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(url('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('assets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('assets/vendor/quill/quill.snow.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('assets/vendor/quill/quill.bubble.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('assets/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('assets/vendor/simple-datatables/style.css')); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo e(url('assets/css/style.css')); ?>" rel="stylesheet">
  <?php echo $__env->yieldContent('style'); ?>

</head>

<body>
    <?php echo $__env->make('admin.layouts._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main id="main" class="main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('admin.layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Vendor JS Files -->
<script src="<?php echo e(url('assets/vendor/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/vendor/chart.js/chart.umd.js')); ?>"></script>
<script src="<?php echo e(url('assets/vendor/echarts/echarts.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/vendor/quill/quill.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/vendor/simple-datatables/simple-datatables.js')); ?>"></script>
<script src="<?php echo e(url('assets/vendor/tinymce/tinymce.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/vendor/php-email-form/validate.js')); ?>"></script>

<!-- Template Main JS File -->
<script src="<?php echo e(url('assets/js/main.js')); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>

</body>

</html><?php /**PATH C:\xampp\htdocs\carac\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>