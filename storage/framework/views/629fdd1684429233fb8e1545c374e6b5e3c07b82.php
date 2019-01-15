<?php $__env->startSection('user-roles-add-content'); ?>

<?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="hf_post_type" id="hf_post_type" value="add">
 
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.add_user_role_title')); ?> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default btn-xs" href="<?php echo e(route('admin.users_roles_list')); ?>"><?php echo e(trans('admin.user_role_list_title')); ?></a></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-primary pull-right" type="submit"><?php echo e(trans('admin.save')); ?></button>
      </div>
    </div>
  </div>
  
 <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <div class="col-sm-3">
              <label class="control-label" for="inputEnterRoleName"><?php echo e(trans('admin.enter_role_name')); ?></label>
            </div>
            <div class="col-sm-9">
              <input type="text" placeholder="<?php echo e(trans('admin.enter_role_name')); ?>" class="form-control" value="" id="user_role_name" name="user_role_name">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-3">
              <label class="control-label" for="inputAccessList"><?php echo e(trans('admin.access_list_by_role')); ?></label>
            </div>
            <div class="col-sm-9 permissions-file">
              <ul>
                <?php $i = 1;?>  
                <?php $__currentLoopData = get_permissions_files_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <li>
                    <div class="allow-btn">
                      <div class="onoffswitch">
                        <input type="checkbox" name="allow_permissions[]" class="onoffswitch-checkbox file-name" id="allow_permissions_<?php echo e($i); ?>" value="<?php echo e($key); ?>">
                        <label class="onoffswitch-label" for="allow_permissions_<?php echo e($i); ?>">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                        </label>
                      </div>
                    </div>
                    <div class="permissions-file-name"><?php echo $val; ?></div>
                  </li>
                  <?php $i++;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <li>
                  <div class="allow-btn">
                    <div class="onoffswitch">
                      <input type="checkbox" name="allow_permissions_all" class="onoffswitch-checkbox" id="allow_permissions_all" value="all_checkbox_enable">
                      <label class="onoffswitch-label" for="allow_permissions_all">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                      </label>
                    </div>
                  </div>
                  <div class="permissions-file-name"><?php echo trans('admin.access_list_allow_for_all'); ?></div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
  
</form>

<?php $__env->stopSection(); ?>