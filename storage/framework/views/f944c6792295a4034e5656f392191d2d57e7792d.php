<?php if( count($order_details_by_order_id) > 0): ?>
<div id="user_order_details">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="col-sm-3">
        <div class="order-received-label-1 text-uppercase"><strong><?php echo e(trans('frontend.order_number')); ?></strong></div>
        <div class="order-received-label-2"><em>#<?php echo $order_details_by_order_id['order_id']; ?></em></div>
      </div>
      <div class="col-sm-3">
        <div class="order-received-label-1"><strong><?php echo e(trans('frontend.date')); ?></strong></div>
        <div class="order-received-label-2"><em><?php echo $order_details_by_order_id['order_date']; ?></em></div>
      </div>
      <div class="col-sm-3">
        <div class="order-received-label-1"><strong><?php echo e(trans('frontend.total')); ?></strong></div>
        <div class="order-received-label-2"><em><?php echo price_html( $order_details_by_order_id['_final_order_total'], $order_details_by_order_id['_order_currency'] ); ?></em></div>
      </div>
      <div class="col-sm-3">
        <div class="order-received-label-1"><strong><?php echo e(trans('frontend.payment_method')); ?></strong></div>
        <div class="order-received-label-2"><em><?php echo e(get_payment_method_title($order_details_by_order_id['_payment_method'])); ?></em></div>
      </div>
      <div class="clearfix"></div><br>

    <?php if(isset($order_details_by_order_id['_payment_details']['method_instructions'])): ?>  
    <p class="payment_ins"><?php echo e($order_details_by_order_id['_payment_details']['method_instructions']); ?></p>
    <?php endif; ?>

    <?php if(isset($order_details_by_order_id['_payment_details']['account_details'])): ?>  
      <div class="col-md-6">
        <h3><?php echo e(trans('frontend.our_bank_details')); ?></h3><br>
      <p><?php echo e(trans('frontend.account_name')); ?>: <?php echo e($order_details_by_order_id['_payment_details']['account_details']['account_name']); ?></p>
      <p><?php echo e(trans('frontend.account_number')); ?>: <?php echo e($order_details_by_order_id['_payment_details']['account_details']['account_number']); ?></p>
      <p><?php echo e(trans('frontend.bank_name')); ?>: <?php echo e($order_details_by_order_id['_payment_details']['account_details']['bank_name']); ?></p>
      <p><?php echo e(trans('frontend.bank_short_code')); ?>: <?php echo e($order_details_by_order_id['_payment_details']['account_details']['short_code']); ?></p>
      <p><?php echo e(trans('frontend.iban')); ?>: <?php echo e($order_details_by_order_id['_payment_details']['account_details']['iban']); ?></p>
      <p><?php echo e(trans('frontend.bic_swift')); ?>: <?php echo e($order_details_by_order_id['_payment_details']['account_details']['swift']); ?></p>
    </div>
    <div class="col-md-6">
       <?php if($order_details_by_order_id['_payment_method'] == 'cod'): ?>
              
            <?php else: ?>
              
              <h4> Veuillez completer par la photo du talon et la ville de livraison </h4><hr>              
              <?php echo Form::open(['action' => ['Frontend\FrontendManagerController@addTalonImage', $order_details_by_order_id['order_id']], 'files' => 'true', 'method' => 'POST', 'enctype' => 'multipart/data']); ?>

                <div class="container">
                  <div class="row">
                    <div class="col-md-1">
                      
                      <select id="change_town" name="change_town">
                        
                        <option value="Alger"><?php echo e(trans('Alger')); ?></option>
                        <option value="Oran"><?php echo e(trans('Oran')); ?></option>
                        <option value="Annaba"><?php echo e(trans('Annaba')); ?></option>

                      </select>
                      
                    </div>
                    <div >
                      <?php echo e(Form::file('talon_image','',array('required'))); ?>

                      <br>
                    </div>
                    <div class="alert alert-danger" style="margin-top: 5px; width: 20%">
                       Obligatoire
                     </div>
                    </div>
                  </div>
                                
                    <?php echo e(Form::hidden('_method', 'PUT')); ?>

                    <?php echo e(Form::submit('Confirmer', ['class' => 'btn btn-primary'])); ?>

                    
                    <?php echo Form::close(); ?>

                </div>
           
            <?php endif; ?>
      </div>
      
    <?php endif; ?>

    <h3><?php echo e(trans('frontend.order_details')); ?></h3><br>
    <div style="width: 100%;">
      <div class="table-responsive cart_info">
        <?php if(count($order_details_by_order_id['ordered_items'])>0): ?>   
          <table class="table table-condensed">
            <thead>
              <tr class="cart_menu">
                <td class="Item"><?php echo e(trans('frontend.item')); ?></td>
                <td class="price"><?php echo e(trans('frontend.price')); ?></td>
                <td class="quantity"><?php echo e(trans('frontend.quantity')); ?></td>
                <td class="total"><?php echo e(trans('frontend.total')); ?></td>
              </tr>
            </thead>
            <tbody> 
              <?php $__currentLoopData = $order_details_by_order_id['ordered_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr>
                <td class="cart_description">
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
                </td>
                <td class="cart_price">
                  <p> <?php echo price_html( $items['order_price'], $order_details_by_order_id['_order_currency'] ); ?> </p>
                </td>
                <td class="cart_quantity">
                    <p> <?php echo $items['quantity']; ?> </p>
                </td>
                <td class="cart_total">
                  <p><?php echo price_html( $items['quantity']*$items['order_price'], $order_details_by_order_id['_order_currency'] ); ?></p>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

              <tr class="order-items-data">
                <td colspan="4" class="order-total">
                  <div class="items-div-main"><div class="items-label"><strong><?php echo e(trans('frontend.tax')); ?></strong></div> <div class="items-value"><?php echo price_html( $order_details_by_order_id['_final_order_tax'], $order_details_by_order_id['_order_currency'] ); ?></div></div>
                  
                  <div class="items-div-main"><div class="items-label"><strong><?php echo e(trans('frontend.shipping_cost')); ?></strong></div> <div class="items-value"><?php echo price_html( $order_details_by_order_id['_final_order_shipping_cost'], $order_details_by_order_id['_order_currency'] ); ?></div></div>

                  <?php if($order_details_by_order_id['_is_order_coupon_applyed'] == true): ?>
                  <div class="items-div-main order-discount-label"><div class="items-label"><strong><?php echo e(trans('frontend.coupon_discount_label')); ?></strong></div> <div class="items-value"> - <?php echo price_html( $order_details_by_order_id['_final_order_discount'], $order_details_by_order_id['_order_currency'] ); ?></div></div>
                  <?php endif; ?>

                  <div class="items-div-main"><div class="items-label"><strong><?php echo e(trans('frontend.order_total')); ?></strong></div> <div class="items-value"><?php echo price_html( $order_details_by_order_id['_final_order_total'], $order_details_by_order_id['_order_currency'] ); ?></div></div>
                </td>
              </tr>
            </tbody>
          </table>
          <?php endif; ?>
        </div>
      </div>  
      <br>
        <div class="col-sm-6">
          <h4><?php echo e(trans('frontend.billing_address')); ?></h4><hr>
          <p><?php echo $order_details_by_order_id['customer_address']['_billing_first_name'].' '. $order_details_by_order_id['customer_address']['_billing_last_name']; ?></p>
          <?php if($order_details_by_order_id['customer_address']['_billing_company']): ?>
            <p><strong><?php echo e(trans('frontend.company')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_billing_company']; ?></p>
          <?php endif; ?>
          <p><strong><?php echo e(trans('frontend.address_1')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_billing_address_1']; ?></p>
          <?php if($order_details_by_order_id['customer_address']['_billing_address_2']): ?>
            <p><strong><?php echo e(trans('frontend.address_2')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_billing_address_2']; ?></p>
          <?php endif; ?>
          <p><strong><?php echo e(trans('frontend.city')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_billing_city']; ?></p>
          <p><strong><?php echo e(trans('frontend.postCode')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_billing_postcode']; ?></p>
          <p><strong><?php echo e(trans('frontend.country')); ?>:</strong> <?php echo get_country_by_code( $order_details_by_order_id['customer_address']['_billing_country'] ); ?></p>

          <br>

          <p><strong><?php echo e(trans('frontend.phone')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_billing_phone']; ?></p>

          <?php if($order_details_by_order_id['customer_address']['_billing_fax']): ?>
            <p><strong><?php echo e(trans('frontend.fax')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_billing_fax']; ?></p>
          <?php endif; ?>
          <p><strong><?php echo e(trans('frontend.email')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_billing_email']; ?></p>
        </div>

        <div class="col-sm-6">
          <h4><?php echo e(trans('frontend.shipping_address')); ?></h4><hr>
          <p><?php echo $order_details_by_order_id['customer_address']['_shipping_first_name'].' '. $order_details_by_order_id['customer_address']['_shipping_last_name']; ?></p>
          <?php if($order_details_by_order_id['customer_address']['_shipping_company']): ?>
            <p><strong><?php echo e(trans('frontend.company')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_shipping_company']; ?></p>
          <?php endif; ?>
          <p><strong><?php echo e(trans('frontend.address_1')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_shipping_address_1']; ?></p>
          <?php if($order_details_by_order_id['customer_address']['_shipping_address_2']): ?>
            <p><strong><?php echo e(trans('frontend.address_2')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_shipping_address_2']; ?></p>
          <?php endif; ?>
          <p><strong><?php echo e(trans('frontend.city')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_shipping_city']; ?></p>
          <p><strong><?php echo e(trans('frontend.postCode')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_shipping_postcode']; ?></p>
          <p><strong><?php echo e(trans('frontend.country')); ?>:</strong> <?php echo get_country_by_code( $order_details_by_order_id['customer_address']['_shipping_country'] ); ?></p>

          <br>

          <p><strong><?php echo e(trans('frontend.phone')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_shipping_phone']; ?></p>

          <?php if($order_details_by_order_id['customer_address']['_shipping_fax']): ?>
            <p><strong><?php echo e(trans('frontend.fax')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_shipping_fax']; ?></p>
          <?php endif; ?>

          <p><strong><?php echo e(trans('frontend.email')); ?>:</strong> <?php echo $order_details_by_order_id['customer_address']['_shipping_email']; ?></p>
        </div>
    </div>
  </div>
  <br>
  <?php else: ?>
  <section id="order-received-content">
    <div class="container new-container">
      <h5><?php echo e(trans('frontend.no_content_yet')); ?></h5>
    </div>
  </section> 
</div>  
<?php endif; ?>