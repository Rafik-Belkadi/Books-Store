<div class="footer-top full-width">
  <div class="footer-top-background">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
          <h3 class="widget-title">A propos</h3>
          <div class="is-divider small"></div>
          <p><?php echo $appearance_all_data['footer_details']['footer_about_us_description']; ?></p>
         
        
        
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
          <h3 class="widget-title"><?php echo trans('frontend.footer_tags_label'); ?></h3>
          <div class="is-divider small"></div>
          <div class="footer-tags-list">
            <?php if(count($popular_tags_list) > 0): ?>
              <?php $__currentLoopData = $popular_tags_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <a href="<?php echo e(route('tag-single-page', $tags['slug'])); ?>"><?php echo $tags['name']; ?></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php else: ?>
            <p class="not-available"><?php echo trans('frontend.footer_no_tags_label'); ?></p>
            <?php endif; ?>
          </div>
        </div>
        

        <div class="col-xs-12 col-sm-12 col-md-4">
           <h3 class="widget-title"><?php echo trans('frontend.footer_follow_us'); ?></h3>
          <div class="is-divider small"></div>
          <ul class="social-media">
            <li><a class="facebook" href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['fb']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.fb_tooltip_msg')); ?>"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['twitter']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.twitter_tooltip_msg')); ?>"><i class="fa fa-twitter"></i></a></li>
            <li><a class="linkedin" href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['linkedin']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.linkedin_tooltip_msg')); ?>"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="dribbble" href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['dribbble']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.dribbble_tooltip_msg')); ?>"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="google-plus" href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['google_plus']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.google_plus_tooltip_msg')); ?>"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="instagram" href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['instagram']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.instagram_tooltip_msg')); ?>"><i class="fa fa-instagram"></i></a></li>
            <li><a class="youtube-play" href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['youtube']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.youtube_play_tooltip_msg')); ?>"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
        </div>
        </div>

       
      </div>
    </div>
  </div>
</div>
