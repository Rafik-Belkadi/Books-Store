<?php $__env->startSection('orders-details-content'); ?>

<script> 
  $(document).ready(function () {
        var small={width: "200px",height: "116px"};
        var large={width: "500px",height: "300px"};
        var count=1; 
        $("#imgtab").css(small).on('click',function () { 
            $(this).animate((count==1)?large:small);
            count = 1-count;
        });
    });
</script>
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <h4><?php echo e(trans('admin.change_order_status')); ?></h4><hr>
          <div class="form-group">
            <div class="col-sm-3">
              <select id="change_order_status" name="change_order_status">
                <?php if($order_data_by_id['_order_status'] == 'pending'): ?>
                  <option selected value="pending"><?php echo e(trans('admin.pending_payment')); ?></option>
                <?php else: ?> 
                  <option value="pending"><?php echo e(trans('admin.pending_payment')); ?></option>
                <?php endif; ?>

                <?php if($order_data_by_id['_order_status'] == 'processing'): ?>
                  <option selected value="processing"><?php echo e(trans('admin.processing')); ?></option>
                <?php else: ?> 
                  <option value="processing"><?php echo e(trans('admin.processing')); ?></option>
                <?php endif; ?>

                <?php if($order_data_by_id['_order_status'] == 'on-hold'): ?>
                  <option selected value="on-hold"><?php echo e(trans('admin.on_hold')); ?></option>
                <?php else: ?> 
                  <option value="on-hold"><?php echo e(trans('admin.on_hold')); ?></option>
                <?php endif; ?>

                <?php if($order_data_by_id['_order_status'] == 'completed'): ?>
                  <option selected value="completed"><?php echo e(trans('admin.completed')); ?></option>
                <?php else: ?> 
                  <option value="completed"><?php echo e(trans('admin.completed')); ?></option>
                <?php endif; ?>

                <?php if($order_data_by_id['_order_status'] == 'cancelled'): ?>
                  <option selected value="cancelled"><?php echo e(trans('admin.cancelled')); ?></option>
                <?php else: ?> 
                  <option value="cancelled"><?php echo e(trans('admin.cancelled')); ?></option>
                <?php endif; ?>

                <?php if($order_data_by_id['_order_status'] == 'refunded'): ?>
                  <option selected value="refunded"><?php echo e(trans('admin.refunded')); ?></option>
                <?php else: ?> 
                  <option value="refunded"><?php echo e(trans('admin.refunded')); ?></option>
                <?php endif; ?>

                <?php if($order_data_by_id['_order_status'] == 'shipping'): ?>
                  <option selected value="shipping"><?php echo e(trans('admin.shipping')); ?></option>
                <?php else: ?> 
                  <option value="shipping"><?php echo e(trans('admin.shipping')); ?></option>
                <?php endif; ?>
              </select>
            </div>
            <div class="col-sm-9">
              <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_change')); ?></button>
            </div>
          </div>
        </div>
         <div class="col-md-6">
          <h4><?php echo e(trans('Envoyer une notification au client')); ?></h4><hr>
          <select id="change_order_status" name="message_status">
            
            <option value="Paiement refusé, le talon est invalide"><?php echo e(trans('Paiement refusé, le talon est invalide')); ?></option>
            <option value="Paiement Accepté livraison en cours"><?php echo e(trans('Paiement Accepté livraison en cours')); ?></option>
            <option value="Livraison en cours"><?php echo e(trans('Livraison en cours')); ?></option>

          </select>
        </div>
      </div>
    </div>
  </div>  
</form>  
<br>
<div class="box">
  <div class="box-body">
    <div class="row">
      <div class="col-md-4">
        <h4><?php echo e(trans('admin.order_details')); ?></h4><hr>
        <br>
        <p><strong><?php echo e(trans('admin.order')); ?> #:</strong> <?php echo $order_data_by_id['_order_id']; ?>

        <p><strong><?php echo e(trans('admin.order_date')); ?>:</strong> <?php echo $order_data_by_id['_order_date']; ?>

        <p><strong><?php echo e(trans('admin.payment_method')); ?>:</strong> <?php echo get_payment_method_title( $order_data_by_id['_payment_method_title'] ); ?> 
        <p><strong><?php echo e(trans('admin.shipping_method')); ?>:</strong> <?php echo $order_data_by_id['_order_shipping_method']; ?>   
        <p><strong><?php echo e(trans('admin.member')); ?>:</strong> 
            <?php if(!empty($order_data_by_id['_member']['url'])): ?> 
            <img src="<?php echo e(asset('public/uploads/'. $order_data_by_id['_member']['url'])); ?>" style="width: 32px;margin-left: 10px;">
            <?php else: ?> 
            <img src="<?php echo e(default_avatar_img_src()); ?>" style="width: 32px;margin-left: 10px;">
            <?php endif; ?>
            <b><i><?php echo $order_data_by_id['_member']['name']; ?></i></b>
        </p>  
        <p><strong><?php echo e(trans('admin.customer_ip')); ?>:</strong> <?php echo $order_data_by_id['_customer_ip_address']; ?></p>
        <p><strong><?php echo e(trans('admin.order_currency')); ?>:</strong> <?php echo get_currency_name_by_code($order_data_by_id['_order_currency']); ?></p>
      <p><strong>La ville de livraison : </strong> <?php echo $order_data_by_id['_ship_town']; ?></p>
      </div>
      <div class="col-md-4">
          
        <h4><?php echo e(trans('admin.billing_address')); ?></h4><hr>
        <br>
        <p><?php echo $order_data_by_id['_billing_first_name'].' '. $order_data_by_id['_billing_last_name']; ?></p>
        <?php if($order_data_by_id['_billing_company']): ?>
          <p><strong><?php echo e(trans('admin.company')); ?>:</strong> <?php echo $order_data_by_id['_billing_company']; ?></p>
        <?php endif; ?>
        <p><strong><?php echo e(trans('admin.address_1')); ?>:</strong> <?php echo $order_data_by_id['_billing_address_1']; ?></p>
        <?php if($order_data_by_id['_billing_address_2']): ?>
          <p><strong><?php echo e(trans('admin.address_2')); ?>:</strong> <?php echo $order_data_by_id['_billing_address_2']; ?></p>
        <?php endif; ?>
        <p><strong><?php echo e(trans('admin.city')); ?>:</strong> <?php echo $order_data_by_id['_billing_city']; ?></p>
        <p><strong><?php echo e(trans('admin.postCode')); ?>:</strong> <?php echo $order_data_by_id['_billing_postcode']; ?></p>
        <p><strong><?php echo e(trans('admin.country')); ?>:</strong> <?php echo get_country_by_code( $order_data_by_id['_billing_country'] ); ?></p>
        
        
        <br>
        
        <p><strong><?php echo e(trans('admin.phone')); ?>:</strong> <?php echo $order_data_by_id['_billing_phone']; ?></p>
        
        <?php if($order_data_by_id['_billing_fax']): ?>
          <p><strong><?php echo e(trans('admin.fax')); ?>:</strong> <?php echo $order_data_by_id['_billing_fax']; ?></p>
        <?php endif; ?>
        <p><strong><?php echo e(trans('admin.email')); ?>:</strong> <?php echo $order_data_by_id['_billing_email']; ?></p>
        
      </div>
      <div class="col-md-4">
          
        <h4><?php echo e(trans('admin.shipping_address')); ?></h4><hr>
        <br>
        <p><?php echo $order_data_by_id['_shipping_first_name'].' '. $order_data_by_id['_shipping_last_name']; ?></p>
        <?php if($order_data_by_id['_shipping_company']): ?>
          <p><strong><?php echo e(trans('admin.company')); ?>:</strong> <?php echo $order_data_by_id['_shipping_company']; ?></p>
        <?php endif; ?>
        <p><strong><?php echo e(trans('admin.address_1')); ?>:</strong> <?php echo $order_data_by_id['_shipping_address_1']; ?></p>
        <?php if($order_data_by_id['_shipping_address_2']): ?>
          <p><strong><?php echo e(trans('admin.address_2')); ?>:</strong> <?php echo $order_data_by_id['_shipping_address_2']; ?></p>
        <?php endif; ?>
        <p><strong><?php echo e(trans('admin.city')); ?>:</strong> <?php echo $order_data_by_id['_shipping_city']; ?></p>
        <p><strong><?php echo e(trans('admin.postCode')); ?>:</strong> <?php echo $order_data_by_id['_shipping_postcode']; ?></p>
        <p><strong><?php echo e(trans('admin.country')); ?>:</strong> <?php echo get_country_by_code( $order_data_by_id['_shipping_country'] ); ?></p>
        
       
        <br>
        
        <p><strong><?php echo e(trans('admin.phone')); ?>:</strong> <?php echo $order_data_by_id['_shipping_phone']; ?></p>
        
        <?php if($order_data_by_id['_shipping_fax']): ?>
          <p><strong><?php echo e(trans('admin.fax')); ?>:</strong> <?php echo $order_data_by_id['_shipping_fax']; ?></p>
        <?php endif; ?>
        <p><strong><?php echo e(trans('admin.email')); ?>:</strong> <?php echo $order_data_by_id['_shipping_email']; ?></p>
        
      </div>
      <?php if($order_data_by_id['_payment_method_title'] == 'cod'): ?>

      <?php else: ?>
      
          <div class="col-md-4">
        <h4>Le Talon </h4><hr>
            <p>clickez pour aggrandir</p>
      <img id="imgtab" class="small" src="<?php echo e(asset('public/uploads/talons/'. $order_data_by_id['_talon_image'])); ?>">
    </div>
      
      <?php endif; ?>
      
    </div>
  </div>
</div>
<br>
<div class="box">
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
          <h4><?php echo e(trans('admin.ordered_items')); ?></h4><hr>
          <div class="table-responsive order_info">
            <table class="table table-condensed">
              <thead>
                <tr class="order_menu">
                  <td class="image"><?php echo e(trans('admin.item')); ?></td>
                  <td class="description"><?php echo e(trans('admin.description')); ?></td>
                  <td class="price"><?php echo e(trans('admin.price')); ?></td>
                  <td class="quantity"><?php echo e(trans('admin.quantity')); ?></td>
                  <td class="total"><?php echo e(trans('admin.totals')); ?></td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $order_data_by_id['_ordered_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                  <td class="order_product">
                      <img src="<?php echo e($items['img_src']); ?>" alt="<?php echo e(basename( $items['img_src'] )); ?>">
                  </td>
                  <td class="order_description">
                    <h5><?php echo $items['name']; ?></h5>
                    <?php $count = 1; ?>
                    <?php if(count($items['options']) > 0): ?>
                    <p>
                      <?php $__currentLoopData = $items['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($count == count($items['options'])): ?>
                          <?php echo $key .' &#8658; '. $val; ?>

                        <?php else: ?>
                          <?php echo $key .' &#8658; '. $val. ' , '; ?>

                        <?php endif; ?>
                        <?php $count ++ ; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </p>
                    <?php endif; ?>
                    
                    <?php if(get_product_type($items['id']) === 'customizable_product'): ?>
                      <?php if($items['acces_token']): ?>
                        <?php if(count(get_admin_customize_images_by_access_token($items['id'], $order_data_by_id['_order_id'], $items['acces_token']))>0): ?>
                          <button class="btn btn-block btn-info view-customize-images" data-images="<?php echo e(htmlspecialchars(json_encode( get_admin_customize_images_by_access_token($items['id'], $order_data_by_id['_order_id'], $items['acces_token']) ))); ?>"><?php echo e(trans('admin.design_images')); ?></button>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endif; ?>
                    
                  </td>
                  <td class="order_price">
                    <p> <?php echo price_html( $items['order_price'], $order_data_by_id['_order_currency'] ); ?> </p>
                  </td>
                  <td class="order_quantity">
                      <p> <?php echo $items['quantity']; ?> </p>
                  </td>
                  <td class="order_line_total">
                    <p><?php echo price_html( ($items['quantity']*$items['order_price']), $order_data_by_id['_order_currency'] ); ?></p>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                  <td colspan="5" class="order-total">
                    <p><strong><?php echo e(trans('admin.tax')); ?></strong> &nbsp;&nbsp;<?php echo price_html( $order_data_by_id['_final_order_tax'], $order_data_by_id['_order_currency'] ); ?></p>
                    
                    <p><strong><?php echo e(trans('admin.shipping_cost')); ?></strong> &nbsp;&nbsp;<?php echo price_html( $order_data_by_id['_final_order_shipping_cost'], $order_data_by_id['_order_currency'] ); ?></p>
                    
                    <p class="discount"><strong><?php echo e(trans('admin.coupon_discount_label')); ?></strong> &nbsp;&nbsp; <span> - </span><?php echo price_html( $order_data_by_id['_final_order_discount'], $order_data_by_id['_order_currency'] ); ?></p>
                    
                    <p><span><strong><?php echo e(trans('admin.order_total')); ?></strong> &nbsp;&nbsp;<?php echo price_html( $order_data_by_id['_final_order_total'], $order_data_by_id['_order_currency'] ); ?></span></p>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>

<br>
<div class="box">
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <h4><?php echo e(trans('admin.ordered_notes')); ?></h4><hr>
        <p><?php echo $order_data_by_id['_order_notes']; ?></p>
      </div>
    </div>
  </div>
</div>

<?php if(count($order_data_by_id['_order_history']) > 0): ?>
<br>
<div class="box">
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <h4><?php echo e(trans('admin.ordered_download_history')); ?></h4><hr>
        <?php $__currentLoopData = $order_data_by_id['_order_history']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="download-history">
            <div class="downloaded-file-name"><?php echo e(trans('admin.downloaded_file_name_label')); ?> : <a download="" href="<?php echo e(url('/public/uploads'). $data->file_url); ?>"><?php echo e($data->file_name); ?></a></div>
          <div class="total-download"><?php echo e(trans('admin.total_download_label')); ?> : <?php echo e($data->total); ?></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="modal fade" id="customizeImages" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">✕</button>
        <br>
        <i class="icon-credit-card icon-7x"></i>
        <p class="no-margin"><?php echo e(trans('admin.all_design_images')); ?></p>
      </div>
      <div class="modal-body" style="text-align: center;"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default attachtopost" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>