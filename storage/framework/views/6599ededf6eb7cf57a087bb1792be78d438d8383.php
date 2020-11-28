<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="brand-link"> 
      <span class="brand-text font-weight-light" style="margin-left: 47px"><b>Dashboard</b></span>
    </a> 
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) --> 
      <?php
            $accountSubMenuUrls = App\Helper\MyFuncs::mainMenu(1);
            $configrations = App\Helper\MyFuncs::mainMenu(2);
            $students = App\Helper\MyFuncs::mainMenu(3);
            $Finances = App\Helper\MyFuncs::mainMenu(4);
            $Homeworks = App\Helper\MyFuncs::mainMenu(8);
            $Attendances = App\Helper\MyFuncs::mainMenu(9);
            $Certificates = App\Helper\MyFuncs::mainMenu(10);
            $FeeCertificates = App\Helper\MyFuncs::mainMenu(11);
            $UserActivitys = App\Helper\MyFuncs::mainMenu(12);
            $RegistrationForms = App\Helper\MyFuncs::mainMenu(13);
            $Transports = App\Helper\MyFuncs::mainMenu(14);
            $Exams = App\Helper\MyFuncs::mainMenu(15);
            $SMSs = App\Helper\MyFuncs::mainMenu(16);
            $menus=App\Helper\MyFuncs::showMenu();
            $userHasMenus=App\Helper\MyFuncs::userHasMinu();
            $menuTypes = App\Model\MinuType::whereIn('id',$userHasMenus)->orderBy('sorting_id','asc')->get();
           
         ?>

         <?php $__currentLoopData = $menuTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php
           $subMenus = App\Helper\MyFuncs::mainMenu($menuType->id);
         ?> 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa <?php echo e($menuType->icon); ?>"></i>
              <p>
                <?php echo e($menuType->name); ?>

                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="nav-item">
                <a href="<?php echo e(route(''.$subMenu->url)); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo e($subMenu->name); ?></p>
                </a>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </ul>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>