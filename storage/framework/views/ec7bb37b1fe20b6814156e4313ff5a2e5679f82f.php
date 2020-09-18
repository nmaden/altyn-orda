<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo e(route('admin_index')); ?>">Золотая орда </a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <div class="navbar-right">
            <ul class="nav navbar-nav">	
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bookmark position-left"></i>  <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu width-200">
                       
                        <li ><a href="<?php echo e(route('admin_logout')); ?>" > выйти</a></li>
                    </ul>
                </li>
                        
            </ul>
        </div>
    </div>
</div>
<!-- /main navbar --><?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/__block/main_navbar.blade.php ENDPATH**/ ?>