<?php $__env->startSection('frontend-brand-single-page-content'); ?>
<br>
<div class="container new-container">
  <div id="brand_single_page_main">
    <div class="row">
      <div class="col-md-4">
          <div class="brand-details">
              <div class="brand-info">
                  <div class="brand-logo">
                    <?php if($brand_details_by_slug['brand_details']['brand_logo_img_url']): ?>
                    <img src="<?php echo e(url('/'). $brand_details_by_slug['brand_details']['brand_logo_img_url']); ?>" alt="brand-logo">
                    <?php else: ?>
                    <img src="<?php echo e(default_placeholder_img_src()); ?>" alt="no-brand-logo">
                    <?php endif; ?>
                  </div>
                  <div class="brand-name"><?php echo $brand_details_by_slug['brand_details']['name']; ?>,</div>
                  <div class="brand-country"> <?php echo $brand_details_by_slug['brand_details']['brand_country_name']; ?></div>
              </div>
              <div class="brand-description">
                  <p><?php echo string_decode($brand_details_by_slug['brand_details']['brand_short_description']); ?></p>
              </div>
          </div>
      </div> 
      <div class="col-md-8">
          <div class="brand-products">
            <?php if(!empty($brand_details_by_slug['products']) && $brand_details_by_slug['products']->count() > 0): ?>
              <div class="product-content clearfix">
                <?php $__currentLoopData = $brand_details_by_slug['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <div class="col-xs-12 col-sm-6 col-md-6 extra-padding">
                    <div class="hover-product">
                      <div class="hover">
                        <?php if(get_product_image($products->id)): ?>
                        <img class="img-responsive" src="<?php echo e(get_product_image($products->id)); ?>" alt="<?php echo e(basename(get_product_image($products->id))); ?>" />
                        <?php else: ?>
                        <img class="img-responsive" src="<?php echo e(default_placeholder_img_src()); ?>" alt="" />
                        <?php endif; ?>

                        <div class="overlay">
                          <button class="info quick-view-popup" data-id="<?php echo e($products->id); ?>"><?php echo e(trans('frontend.quick_view_label')); ?></button>
                        </div>
                      </div> 

                      <div class="single-product-bottom-section">
                        <h3><?php echo get_product_title($products->id); ?></h3>

                        <?php if(get_product_type($products->id) == 'simple_product'): ?>
                          <p><?php echo price_html( get_product_price($products->id), get_frontend_selected_currency() ); ?></p>
                        <?php elseif(get_product_type($products->id) == 'configurable_product'): ?>
                          <p><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id); ?></p>
                        <?php elseif(get_product_type($products->id) == 'customizable_product' || get_product_type($products->id) == 'downloadable_product'): ?>
                          <?php if(count(get_product_variations($products->id))>0): ?>
                            <p><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id); ?></p>
                          <?php else: ?>
                            <p><?php echo price_html( get_product_price($products->id), get_frontend_selected_currency() ); ?></p>
                          <?php endif; ?>
                        <?php endif; ?>

                        <div class="title-divider"></div>
                        <div class="single-product-add-to-cart">
                          <?php if(get_product_type($products->id) == 'simple_product'): ?>
                            <a href="" data-id="<?php echo e($products->id); ?>" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_cart_label')); ?>"><i class="fa fa-shopping-cart"></i></a>
                            <a href="" class="btn btn-sm btn-style product-wishlist" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_wishlist_label')); ?>"><i class="fa fa-heart"></i></a>
                            <a href="" class="btn btn-sm btn-style product-compare" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_compare_list_label')); ?>"><i class="fa fa-exchange"></i></a>
                            <a href="<?php echo e(route('details-page', $products->post_slug)); ?>" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.product_details_label')); ?>"><i class="fa fa-eye"></i></a>

                          <?php elseif(get_product_type($products->id) == 'configurable_product'): ?>
                            <a href="<?php echo e(route('details-page', $products->post_slug)); ?>" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.select_options')); ?>"><i class="fa fa-hand-o-up"></i></a>
                            <a href="" class="btn btn-sm btn-style product-wishlist" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_wishlist_label')); ?>"><i class="fa fa-heart"></i></a>
                            <a href="" class="btn btn-sm btn-style product-compare" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_compare_list_label')); ?>"><i class="fa fa-exchange"></i></a>
                            <a href="<?php echo e(route('details-page', $products->post_slug)); ?>" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.product_details_label')); ?>"><i class="fa fa-eye"></i></a>

                          <?php elseif(get_product_type($products->id) == 'customizable_product'): ?>
                            <?php if(is_design_enable_for_this_product($products->id)): ?>
                              <a href="<?php echo e(route('customize-page', $products->post_slug)); ?>" class="btn btn-sm btn-style product-customize-bg" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.customize')); ?>"><i class="fa fa-gears"></i></a>
                              <a href="" class="btn btn-sm btn-style product-wishlist" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_wishlist_label')); ?>"><i class="fa fa-heart"></i></a>
                              <a href="" class="btn btn-sm btn-style product-compare" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_compare_list_label')); ?>"><i class="fa fa-exchange"></i></a>
                              <a href="<?php echo e(route('details-page', $products->post_slug)); ?>" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.product_details_label')); ?>"><i class="fa fa-eye"></i></a>

                            <?php else: ?>
                              <a href="" data-id="<?php echo e($products->id); ?>" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_cart_label')); ?>"><i class="fa fa-shopping-cart"></i></a>
                              <a href="" class="btn btn-sm btn-style product-wishlist" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_wishlist_label')); ?>"><i class="fa fa-heart"></i></a>
                              <a href="" class="btn btn-sm btn-style product-compare" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_compare_list_label')); ?>"><i class="fa fa-exchange"></i></a>
                              <a href="<?php echo e(route('details-page', $products->post_slug)); ?>" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.product_details_label')); ?>"><i class="fa fa-eye"></i></a>
                            <?php endif; ?>
                          <?php elseif(get_product_type( $products->id ) == 'downloadable_product'): ?> 
                            <?php if(count(get_product_variations( $products->id ))>0): ?>
                            <a href="<?php echo e(route( 'details-page', $products->post_slug )); ?>" class="btn btn-sm btn-style select-options-bg" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.select_options')); ?>"><i class="fa fa-hand-o-up"></i></a>
                            <a href="" class="btn btn-sm btn-style product-wishlist" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_wishlist_label')); ?>"><i class="fa fa-heart"></i></a>
                            <a href="" class="btn btn-sm btn-style product-compare" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_compare_list_label')); ?>"><i class="fa fa-exchange" ></i></a>
                            <a href="<?php echo e(route('details-page', $products->post_slug )); ?>" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.product_details_label')); ?>"><i class="fa fa-eye"></i></a>
                            <?php else: ?>
                            <a href="" data-id="<?php echo e($products->id); ?>" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_cart_label')); ?>"><i class="fa fa-shopping-cart"></i></a>
                            <a href="" class="btn btn-sm btn-style product-wishlist" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_wishlist_label')); ?>"><i class="fa fa-heart"></i></a>
                            <a href="" class="btn btn-sm btn-style product-compare" data-id="<?php echo e($products->id); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.add_to_compare_list_label')); ?>"><i class="fa fa-exchange" ></i></a>
                            <a href="<?php echo e(route('details-page', $products->post_slug )); ?>" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.product_details_label')); ?>"><i class="fa fa-eye"></i></a>
                            <?php endif; ?>                           
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </div>
              <div class="products-pagination"><?php echo $brand_details_by_slug['products']->appends(Request::capture()->except('page'))->render(); ?></div>
          <?php else: ?>
          <br><p><?php echo e(trans('frontend.no_product_for_brands_label')); ?></p>
          <?php endif; ?>
      </div>
          </div>
      </div> 
    </div>
  </div>
</div>    
<?php $__env->stopSection(); ?>