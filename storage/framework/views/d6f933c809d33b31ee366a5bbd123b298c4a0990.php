<?php $__env->startSection('frontend-user-account'); ?>
<div id="user_account" class="container new-container">
  <br> 
  <div class="row">
    <div class="col-xs-12 col-sm-3 col-md-3">
      <div class="account-tab-main">
        <ul class="nav nav-pills nav-stacked">
          <?php if(Request::is('user/account/dashboard') || Request::is('user/account')): ?>
          <li class="active"><a href="<?php echo e(route('user-dashboard-page')); ?>"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
          <?php else: ?>
            <li><a href="<?php echo e(route('user-dashboard-page')); ?>"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
          <?php endif; ?>

          <?php if(Request::is('user/account/notifications')): ?>
          <li class="active"><a href="<?php echo e(route('user-notifications')); ?>"><i class="fa fa-bell"></i> <?php echo e(trans('frontend.dashboard')); ?></a> Notifications (<?php echo e($notifications_length); ?>)</li>
          <?php else: ?>
            <li><a href="<?php echo e(route('user-notifications')); ?>"><i class="fa fa-bell"></i> Notifications (<?php echo e($notifications_length); ?>)</a></li>
          <?php endif; ?>
          
          <?php if( Request::is('user/account/my-address') ||  Request::is('user/account/my-address/add') ||  Request::is('user/account/my-address/edit') ): ?>
            <li class="active"><a href="<?php echo e(route('my-address-page')); ?>"><i class="fa fa-map-marker"></i> Mon Adresse</a></li>
          <?php else: ?>
            <li><a href="<?php echo e(route('my-address-page')); ?>"><i class="fa fa-map-marker"></i> Mon Adresse</a></li>
          <?php endif; ?>
          
          <?php if(Request::is('user/account/my-orders') || Request::is('user/account/order-details/**')): ?>
            <li class="active"><a href="<?php echo e(route('my-orders-page')); ?>"><i class="fa fa-file-text-o"></i> Mes Commandes</a></li>
          <?php else: ?>
            <li><a href="<?php echo e(route('my-orders-page')); ?>"><i class="fa fa-file-text-o"></i> Mes Commandes</a></li>
          <?php endif; ?>
          
          <?php if(Request::is('user/account/my-saved-items')): ?>
            <li class="active"><a href="<?php echo e(route('my-saved-items-page')); ?>"><i class="fa fa-save"></i> Mes produits sauvgardés</a></li>
          <?php else: ?>
            <li><a href="<?php echo e(route('my-saved-items-page')); ?>"><i class="fa fa-save"></i> Mes produits sauvgardés</a></li>
          <?php endif; ?>
          
          <?php if(Request::is('user/account/my-coupons')): ?>
            <li class="active"><a href="<?php echo e(route('my-coupons-page')); ?>"><i class="fa fa-scissors"></i> Mes Coupons</a></li>
          <?php else: ?>
            <li><a href="<?php echo e(route('my-coupons-page')); ?>"><i class="fa fa-scissors"></i> Mes Coupons</a></li>
          <?php endif; ?>
          
          <?php if(Request::is('user/account/my-profile')): ?>
            <li class="active"><a href="<?php echo e(route('my-profile-page')); ?>"><i class="fa fa-user"></i> Mon Profil</a></li>
          <?php else: ?>
            <li><a href="<?php echo e(route('my-profile-page')); ?>"><i class="fa fa-user"></i> Mon Profil</a></li>
          <?php endif; ?>
          
          <?php if(is_frontend_user_logged_in()): ?>
          <form method="post" action="<?php echo e(route('user-logout')); ?>" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">  
            <li><button type="submit" class="btn btn-default btn-block"><i class="fa fa-circle-o-notch"></i> Se Déconnecter</button>  </li>
          </form>
          <?php endif; ?>
        </ul>
      </div>  
    </div>
    <div class="col-xs-12 col-sm-3 col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading text-right">
          <div class="new-media">
            <div class="new-media-left">
              <?php if($login_user_details['user_photo_url']): ?>
                <img class="new-media-object" src="<?php echo e(asset('public/uploads/'. $login_user_details['user_photo_url'])); ?>" alt="">
              <?php else: ?>
                <img class="new-media-object" src="<?php echo e(default_avatar_img_src()); ?>" alt="">
              <?php endif; ?>
            </div>
              
            <div class="new-media-body">
              <h5 class="new-media-heading"><?php echo e($login_user_details['user_display_name']); ?></h5>
              <h6 class="new-media-heading"><?php echo trans('frontend.member_since_label'); ?> <?php echo Carbon\Carbon::parse($login_user_details['member_since'])->format('d, M Y'); ?></h6>
             </div>
          </div>
        </div>
        <div class="panel-body">
          <?php if(Request::is('user/account/dashboard') || Request::is('user/account')): ?>
            <?php echo $__env->make('pages.frontend.user-account.my-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/my-address')): ?>  
            <?php echo $__env->make('pages.frontend.user-account.my-address', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/my-address/add')): ?>  
            <?php echo $__env->make('pages.frontend.user-account.add-address', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/my-address/edit')): ?>  
            <?php echo $__env->make('pages.frontend.user-account.edit-address', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/my-profile') ): ?>  
            <?php echo $__env->make('pages.frontend.user-account.user-profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
          <?php elseif(Request::is('user/account/my-orders') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.my-orders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
          <?php elseif(Request::is('user/account/view-orders-details/*') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.user-order-details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/my-saved-items') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.my-wishlist', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
          <?php elseif(Request::is('user/account/my-coupons') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.my-coupons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/order-details/*') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.order-details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>  