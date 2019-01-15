<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div marginheight="0" marginwidth="0">
  <div style="background-color:#f5f5f5;margin:0;padding:70px 0 70px 0;width:100%" dir="ltr">
    <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td valign="top" align="center">
						<div></div>
              <table width="600" cellspacing="0" cellpadding="0" border="0" style="background-color:#fdfdfd;border:1px solid #dcdcdc;border-radius:3px!important">
                <tbody>
                  <tr>
                    <td valign="top" align="center">
                      <table width="600" cellspacing="0" cellpadding="0" border="0" style="background-color:#3C8DBC;border-radius:3px 3px 0 0!important;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                        <tbody>
                          <tr>
                            <td style="padding:36px 48px;display:block">
                              <h1 style="color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:center"><?php echo trans('email.thank_you_for_your_order'); ?></h1>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td valign="top" align="center">
                      <table width="600" cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                          <tr>
                            <td valign="top" style="background-color:#fdfdfd">                                              
                              <table width="100%" cellspacing="0" cellpadding="20" border="0">
                                <tbody>
                                  <tr>
                                    <td valign="top" style="padding:48px">
                                      <div style="color:#737373;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
                                        <?php if($_payment_method == 'bacs' || $_payment_method == 'paypal'): ?>
                                          <p style="margin:0 0 16px"><?php echo trans('email.msg_bacs_paypal'); ?>:</p>
                                        <?php elseif($_payment_method == 'cod'): ?>
                                          <p style="margin:0 0 16px"><?php echo trans('email.msg_cod'); ?>:</p>
                                        <?php endif; ?>
                                        
                                        <?php if($_payment_method == 'bacs' || $_payment_method == 'cod'): ?>
                                          <p style="margin:0 0 16px"><?php echo $_payment_method_details['method_instructions']; ?></p>
                                        <?php endif; ?>
                                        
                                        <?php if($_payment_method == 'bacs'): ?>
                                        <h2 style="color:#3c8dbc;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left"><?php echo trans('email.our_bank_details'); ?></h2>
                                        <h3 style="color:#3c8dbc;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:16px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left"><?php echo $_payment_method_details['account_details']['account_name']; ?> - <?php echo $_payment_method_details['account_details']['bank_name']; ?></h3>
                                        <ul>
                                          <li><?php echo e(trans('email.account_number')); ?>:
                                            <strong><?php echo $_payment_method_details['account_details']['account_number']; ?></strong>
                                          </li>
                                          <li><?php echo trans('email.sort_code'); ?>: <strong><?php echo $_payment_method_details['account_details']['short_code']; ?></strong>
                                          </li>
                                        </ul>
                                        <?php endif; ?>
                                         
                                        <h2 style="color:#3c8dbc;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left"><?php echo trans('email.order'); ?> #<?php echo $_order_id; ?></h2>
                                        <table cellspacing="0" cellpadding="6" border="1" style="width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;border:1px solid #e4e4e4">
                                          <thead>
                                            <tr>
                                              <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" scope="col"><?php echo trans('email.product'); ?></th>
                                              <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" scope="col"><?php echo trans('email.quantity'); ?></th>
                                              <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" scope="col"><?php echo trans('email.price'); ?></th>
                                              <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" scope="col"><?php echo trans('email.total'); ?></th>
                                            </tr>
                                          </thead>
                                            <tbody>
                                              <?php $subTotal = 0;?>
                                              <?php $__currentLoopData = $_order_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php $subTotal += $items->quantity * $items->price; ?>
                                                <tr>
                                                  <td style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word;color:#737373;padding:12px"> <?php echo $items->name; ?><br><small></small>
                                                  </td>
                                                  <td style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;padding:12px"><?php echo $items->quantity; ?></td>
                                                  <td style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;padding:12px"><?php echo price_html( get_product_price_html_by_filter($items->price) ); ?></td>
                                                  <td style="text-align:left;vertical-align:middle;border:1px solid #eee;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;color:#737373;padding:12px"><span> <?php echo price_html( get_product_price_html_by_filter($items->quantity * $items->price) ); ?> </span></td>
                                                </tr>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                <th style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px" colspan="3" scope="row"><?php echo trans('email.subtotal'); ?>:</th>
                                                <td style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px"><span><?php echo price_html( get_product_price_html_by_filter($subTotal) ); ?></span></td>
                                              </tr>
                                              <tr>
                                                <th style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px" colspan="3" scope="row"><?php echo trans('email.shipping_cost'); ?>:</th>
                                                <?php if($_order_shipping_cost && $_order_shipping_cost == 0): ?>
                                                   <td style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px"><span><span><?php echo trans('email.free'); ?></span></span></td>
                                                <?php else: ?>
                                                  <td style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px"><span><?php echo price_html( get_product_price_html_by_filter($_order_shipping_cost) ); ?></span></td>
                                                <?php endif; ?>
                                              </tr>
                                              <tr>
                                                <th style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px" colspan="3" scope="row"><?php echo trans('email.tax'); ?>:</th>
                                                <td style="text-align:left;border-top-width:4px;color:#737373;border:1px solid #e4e4e4;padding:12px"><span><?php echo price_html( get_product_price_html_by_filter($_order_tax) ); ?></span></td>
                                              </tr>

                                              <tr>
                                                <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" colspan="3" scope="row"><?php echo trans('email.payment_method'); ?>:</th>
                                                <td style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px"><?php echo get_payment_method_title($_payment_method); ?></td>
                                              </tr>

                                              <tr>
                                                <th style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px" colspan="3" scope="row"><?php echo trans('email.total'); ?>:</th>
                                                <td style="text-align:left;color:#737373;border:1px solid #e4e4e4;padding:12px"><span><?php echo price_html( get_product_price_html_by_filter($_order_total) ); ?></span></td>
                                              </tr>
                                            </tfoot>
                                        </table>
                                        <h2 style="color:#3c8dbc;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left"><?php echo trans('email.customer_details'); ?></h2>
                                        <ul>
                                          <li>
                                          <strong><?php echo trans('email.email'); ?>:</strong> <span style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif"><a target="_blank" href="mailto:<?php echo e($_mail_to); ?>"><?php echo $_mail_to; ?></a></span>
                                          </li>
                                           <li>
                                          <strong><?php echo trans('email.tel'); ?>:</strong> <span style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif"><?php echo $_billing_phone; ?></span>
                                          </li>

                                        </ul>

                                        <table cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top">
                                          <tbody>
                                            <tr>
                                              <td width="50%" valign="top">
                                                <h3 style="color:#3c8dbc;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:16px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left"><?php echo trans('email.billing_address'); ?></h3>
                                                <p style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;margin:0 0 16px"><?php echo $_billing_first_name .' '. $_billing_last_name; ?> <br> <?php echo $_billing_address_1; ?><br> <?php echo $_billing_city; ?> <br> <?php echo $_billing_postcode; ?> <br> <?php echo get_country_by_code($_billing_country); ?></p>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td valign="top" align="center">
                      <table width="600" cellspacing="0" cellpadding="10" border="0">
                        <tbody>
                          <tr>
                            <td valign="top" style="padding:0">
                              <table width="100%" cellspacing="0" cellpadding="10" border="0">
                                <tbody>
                                  <tr>
                                    <td valign="middle" style="padding:0 48px 48px 48px;border:0;color:#99b1c7;font-family:Arial;font-size:12px;line-height:125%;text-align:center" colspan="2">
                                      <p><?php echo trans('email.powered_by'); ?> <?php echo $_site_title; ?></p>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>