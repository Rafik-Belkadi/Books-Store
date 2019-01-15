<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <h4><label><?php echo e(trans('admin.frontend_user_order_list')); ?></label></h4><hr>
    <br>
    <table id="table_user_account_order_list" class="table table-bordered table-striped">
      <thead>
        <tr>
          
          <th><?php echo e(trans('admin.user_account_order_status')); ?></th>
          <th><?php echo e(trans('admin.user_account_order_total')); ?></th>
          <th><?php echo e(trans('admin.user_account_order_date')); ?></th> 
          <th><?php echo e(trans('admin.user_account_order_action')); ?></th>  
        </tr>
      </thead>
      <tbody>
        <?php if(count($orders_list_data) > 0): ?> 
          <?php $__currentLoopData = $orders_list_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
              
              <td><?php echo $row['_order_status']; ?></td>
              <td><?php echo price_html($row['_final_order_total'], $row['_order_currency']); ?></td>  
              <td><?php echo Carbon\Carbon::parse($row['_order_date'])->format('F d, Y'); ?></td>  
              <td><a class="btn btn-default btn-sm" href="<?php echo e(route('account-order-details-page', [$row['_post_id'], $row['_order_process_key']])); ?>"><?php echo trans('frontend.user_account_view_label'); ?></a></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
      </tbody>
      <tfoot>
        <tr>
          <th><?php echo e(trans('admin.user_account_order_id')); ?></th>
          <th><?php echo e(trans('admin.user_account_order_status')); ?></th>
          <th><?php echo e(trans('admin.user_account_order_total')); ?></th>
          <th><?php echo e(trans('admin.user_account_order_date')); ?></th> 
          <th><?php echo e(trans('admin.user_account_order_action')); ?></th>  
        </tr>
      </tfoot>
    </table>
  </div>
</div>