<?php $__env->startSection('frontend-thank-you-content'); ?>
  <?php if( count($order_details_for_thank_you_page) > 0): ?>
  <section id="order-received-content">
    <div class="container new-container">
      <h3>Commande reçu !</h3><br>
      <p>Merci ,Vous receverez bientôt une notification à propos de vos commandes</p>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-3">
            <div class="order-received-label-1"><strong><?php echo e(trans('frontend.date')); ?></strong></div>
            <div class="order-received-label-2"><em><?php echo e($order_details_for_thank_you_page['order_date']); ?></em></div>
          </div>
          <div class="col-sm-3">
            <div class="order-received-label-1"><strong><?php echo e(trans('frontend.total')); ?></strong></div>
            <div class="order-received-label-2"><em><?php echo e(price_html( $order_details_for_thank_you_page['_final_order_total'], $order_details_for_thank_you_page['_order_currency'] )); ?></em></div>
          </div>
          <div class="col-sm-3">
            <div class="order-received-label-1"><strong>Methode de payment</strong></div>
            <div class="order-received-label-2"><em><?php echo e(get_payment_method_title($order_details_for_thank_you_page['_payment_method'])); ?></em></div>
          </div>
          <div class="clearfix"></div><br>
          
        <?php if(isset($order_details_for_thank_you_page['_payment_details']['method_instructions'])): ?>  
        <p class="payment_ins"><?php echo e($order_details_for_thank_you_page['_payment_details']['method_instructions']); ?></p>
        <?php endif; ?>
        
        <?php if(isset($order_details_for_thank_you_page['_payment_details']['account_details'])): ?>  
          <h3>Nos détails bancaires</h3><br>
          <p>Bom de compte: <?php echo e($order_details_for_thank_you_page['_payment_details']['account_details']['account_name']); ?></p>
          <p>N° de compte: <?php echo e($order_details_for_thank_you_page['_payment_details']['account_details']['account_number']); ?></p>
          <p>Nom de la banque: <?php echo e($order_details_for_thank_you_page['_payment_details']['account_details']['bank_name']); ?></p>
          <p>Code court bancaire: <?php echo e($order_details_for_thank_you_page['_payment_details']['account_details']['short_code']); ?></p>
          <p><?php echo e(trans('frontend.iban')); ?>: <?php echo e($order_details_for_thank_you_page['_payment_details']['account_details']['iban']); ?></p>
          <p><?php echo e(trans('frontend.bic_swift')); ?>: <?php echo e($order_details_for_thank_you_page['_payment_details']['account_details']['swift']); ?></p>
        <?php endif; ?>
        
        <h3>Détails de la commande</h3><br>
        <div class="table-responsive cart_info">
          <?php if(count($order_details_for_thank_you_page['ordered_items'])>0): ?>   
            <table class="table table-condensed">
              <thead>
                <tr class="cart_menu">
                  <td class="Item">Produit</td>
                  <td class="price"><?php echo e(trans('frontend.price')); ?></td>
                  <td class="quantity">Quantité</td>
                  <td class="total"><?php echo e(trans('frontend.total')); ?></td>
                </tr>
              </thead>
              <tbody> 
                <?php $__currentLoopData = $order_details_for_thank_you_page['ordered_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
                    
                    <?php if($items['product_type'] == 'downloadable_product' && $order_details_for_thank_you_page['_customer_ip_address'] == get_ip_address()): ?>
                    <?php echo download_file_html( $items['id'], $order_details_for_thank_you_page['order_id']); ?>

                    <?php endif; ?>
                  </td>
                  <td class="cart_price">
                    <p> <?php echo price_html( $items['order_price'], $order_details_for_thank_you_page['_order_currency'] ); ?> </p>
                  </td>
                  <td class="cart_quantity">
                      <p> <?php echo $items['quantity']; ?> </p>
                  </td>
                  <td class="cart_total">
                    <p><?php echo price_html( ($items['quantity']*$items['order_price']), $order_details_for_thank_you_page['_order_currency'] ); ?></p>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                
                <tr class="order-items-data">
                  <td colspan="4" class="order-total">
                    <div class="items-div-main"><div class="items-label"><strong><?php echo e(trans('frontend.tax')); ?></strong></div> <div class="items-value"><?php echo price_html( $order_details_for_thank_you_page['_final_order_tax'], $order_details_for_thank_you_page['_order_currency'] ); ?></div></div>
                    
                    <div class="items-div-main"><div class="items-label"><strong><?php echo e(trans('frontend.shipping_cost')); ?></strong></div> <div class="items-value"><?php echo price_html( $order_details_for_thank_you_page['_final_order_shipping_cost'], $order_details_for_thank_you_page['_order_currency'] ); ?></div></div>
                    
                    <?php if($order_details_for_thank_you_page['_is_order_coupon_applyed'] == true): ?>
                    <div class="items-div-main order-discount-label"><div class="items-label"><strong><?php echo e(trans('frontend.coupon_discount_label')); ?></strong></div> <div class="items-value"> - <?php echo price_html( $order_details_for_thank_you_page['_final_order_discount'], $order_details_for_thank_you_page['_order_currency'] ); ?></div></div>
                    <?php endif; ?>
                    
                    <div class="items-div-main"><div class="items-label"><strong><?php echo e(trans('frontend.order_total')); ?></strong></div> <div class="items-value"><?php echo price_html( $order_details_for_thank_you_page['_final_order_total'], $order_details_for_thank_you_page['_order_currency'] ); ?></div></div>
                  </td>
                </tr>
              </tbody>
            </table>
            <?php endif; ?>
          </div>
          <br>
            
          
            <div class="col-sm-6">
              <h4>Adresse de livraison</h4><hr>
              <p><?php echo $order_details_for_thank_you_page['customer_address']['_shipping_first_name'].' '. $order_details_for_thank_you_page['customer_address']['_shipping_last_name']; ?></p>
              <?php if($order_details_for_thank_you_page['customer_address']['_shipping_company']): ?>
                <p><strong><?php echo e(trans('frontend.company')); ?>:</strong> <?php echo $order_details_for_thank_you_page['customer_address']['_shipping_company']; ?></p>
              <?php endif; ?>
              <p><strong><?php echo e(trans('frontend.address_1')); ?>:</strong> <?php echo $order_details_for_thank_you_page['customer_address']['_shipping_address_1']; ?></p>
              <?php if($order_details_for_thank_you_page['customer_address']['_shipping_address_2']): ?>
                <p><strong><?php echo e(trans('frontend.address_2')); ?>:</strong> <?php echo $order_details_for_thank_you_page['customer_address']['_shipping_address_2']; ?></p>
              <?php endif; ?>
              <p><strong><?php echo e(trans('frontend.city')); ?>:</strong> <?php echo $order_details_for_thank_you_page['customer_address']['_shipping_city']; ?></p>
              <p><strong><?php echo e(trans('frontend.postCode')); ?>:</strong> <?php echo $order_details_for_thank_you_page['customer_address']['_shipping_postcode']; ?></p>
              <p><strong><?php echo e(trans('frontend.country')); ?>:</strong> <?php echo get_country_by_code( $order_details_for_thank_you_page['customer_address']['_shipping_country'] ); ?></p>

              <br>

              <p><strong><?php echo e(trans('frontend.phone')); ?>:</strong> <?php echo $order_details_for_thank_you_page['customer_address']['_shipping_phone']; ?></p>

              <?php if($order_details_for_thank_you_page['customer_address']['_shipping_fax']): ?>
                <p><strong><?php echo e(trans('frontend.fax')); ?>:</strong> <?php echo $order_details_for_thank_you_page['customer_address']['_shipping_fax']; ?></p>
              <?php endif; ?>
              
              <p><strong><?php echo e(trans('frontend.email')); ?>:</strong> <?php echo $order_details_for_thank_you_page['customer_address']['_shipping_email']; ?></p>
            </div>
            <?php if($order_details_for_thank_you_page['_payment_method'] == 'cod'): ?>
              
            <?php else: ?>
              <div class="col-md-6">
              <h4> Veuillez completer par la photo du talon et la ville de livraison </h4><hr>              
              <?php echo Form::open(['action' => ['Frontend\FrontendManagerController@addTalonImage', $order_details_for_thank_you_page['order_id']], 'files' => 'true', 'method' => 'POST', 'enctype' => 'multipart/data']); ?>

                <div class="container">
                  <div class="row">
                    <div class="col-md-3">
                      <div >
                      <select id="change_town" name="change_town">
                        
                        <option value="Alger"><?php echo e(trans('Alger')); ?></option>
                        <option value="Oran"><?php echo e(trans('Oran')); ?></option>
                        <option value="Annaba"><?php echo e(trans('Annaba')); ?></option>

                      </select>
                      </div>
                    </div>
                    <div >
                      <?php echo e(Form::file('talon_image','',array('required'))); ?>

                      <br>
                    </div>
                    <div class="alert alert-danger" style="margin-top: 5px; width: 50%">
                       Obligatoire
                     </div>
                    </div>
                  </div>
                                
              <?php echo e(Form::hidden('_method', 'PUT')); ?>

              <?php echo e(Form::submit('Confirmer', ['class' => 'btn btn-primary'])); ?>

              
              <?php echo Form::close(); ?>

                </div>
            </div>
            <?php endif; ?>
            
        </div>
      </div>
    </div>
  </section>
  <br>
  <?php else: ?>
  <section id="order-received-content">
    <div class="container new-container">
      <h5><?php echo e(trans('frontend.no_content_yet')); ?></h5>
    </div>
  </section>  
  <?php endif; ?>  
<?php $__env->stopSection(); ?>  