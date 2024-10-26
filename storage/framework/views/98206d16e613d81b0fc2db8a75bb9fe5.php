 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?php echo e(url('admin/dashboard')); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard </span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed <?php if(Request::segment(2) == 'add-clients'): ?> active <?php endif; ?>" href="<?php echo e(url('admin/add-clients')); ?>">
          <i class="bi bi-person"></i>
          <span>Add Client Ledger </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('viewclient')); ?>">
          <i class="bi bi-person"></i>
          <span>View Client</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('paymenttxn')); ?>">
          <i class="bi bi-person"></i>
          <span>payment Txn</span>
        </a>
      </li>

      
    </ul>

  </aside><!-- End Sidebar-->
<?php /**PATH C:\xampp\htdocs\carac\resources\views/admin/layouts/_sidebar.blade.php ENDPATH**/ ?>