<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="brand-link"> 
        <span class="brand-text font-weight-light" style="margin-left: 47px"><b>Dashboard</b></span>
    </a>
    <div class="sidebar">
        <?php 
        $mainMenus= App\Model\MainMenu::get();
        ?>
        <?php $__currentLoopData = $mainMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $subMenus = App\Model\SubMenu::where('main_menu_id',$mainMenu->id)->get();
        ?>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link"> 
                        <p>
                            <?php echo e($mainMenu->menu_name); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route(''.$subMenu->link)); ?>" class="nav-link" style="background-color:#01050a"> 
                                <p><?php echo e($subMenu->sub_menu_name); ?></p>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </ul>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('admin.card.print.index')); ?>" class="nav-link"> 
                        <p>
                            Card Print
                        </p>
                    </a>
            </ul>
        </nav>
    </div>
</aside>