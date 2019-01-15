<?php $__env->startSection('update-art-content'); ?>

<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.update_art')); ?> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default btn-xs" href="<?php echo e(route('admin.clipart_list_content')); ?>"><?php echo e(trans('admin.art_lists')); ?></a>&nbsp;&nbsp;<a class="btn btn-default btn-xs" href="<?php echo e(route('admin.add_new_art_content')); ?>"><?php echo e(trans('admin.add_more_art')); ?></a></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-primary pull-right" type="submit"><?php echo e(trans('admin.update')); ?></button>
      </div>
    </div>
  </div>
  
 <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-sm-4 control-label pull-left" for="inputArtName"><?php echo e(trans('admin.art_name')); ?></label>
            <div class="col-sm-8">
                <input type="text" placeholder="<?php echo e(trans('admin.art_name')); ?>" id="inputArtName" name="inputArtName" class="form-control" value="<?php echo e($art_update_data_by_id['post_title']); ?>">
            </div>
          </div>   
          <div class="form-group">
            <label class="col-sm-4 control-label pull-left" for="inputSelectCategory"><?php echo e(trans('admin.select_category')); ?> </label>
            <div class="col-sm-8">
              <select name="inputSelectCategory" id="inputSelectCategory" class="form-control select2" style="width: 100%;">
                <?php if(count($getArtCatByFilter)>0): ?>
                  <?php $__currentLoopData = $getArtCatByFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php if($row['term_id'] == $art_update_data_by_id['art_cat_id']): ?>
                      <option selected="selected" value="<?php echo e($row['term_id']); ?>"><?php echo $row['name']; ?></option>
                    <?php else: ?>
                      <option value="<?php echo e($row['term_id']); ?>"><?php echo $row['name']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label pull-left" for="inputArtStatus"><?php echo e(trans('admin.art_status')); ?></label>
            <div class="col-sm-8">
              <select name="inputArtStatus" id="inputArtStatus" class="form-control select2" style="width: 100%;">
                <?php if($art_update_data_by_id['post_status'] == 1): ?>
                <option selected="selected" value="1"><?php echo e(trans('admin.enable')); ?></option>
                <?php else: ?>
                <option value="1"><?php echo e(trans('admin.enable')); ?></option>
                <?php endif; ?>
                
                <?php if($art_update_data_by_id['post_status'] == 0): ?>
                <option selected="selected" value="0"><?php echo e(trans('admin.disable')); ?></option>
                <?php else: ?>
                <option value="0"><?php echo e(trans('admin.disable')); ?></option>
                <?php endif; ?>
                
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label pull-left" for="inputCategoryName"><?php echo e(trans('admin.upload_your_art_image')); ?></label>
            <div class="col-sm-8">
              <div class="uploadform dropzone no-margin dz-clickable update-art-dropzone-file-upload" id="update_art_dropzone_file_upload" name="update_art_dropzone_file_upload">
                <div class="dz-default dz-message">
                  <span><?php echo e(trans('admin.drop_your_cover_picture_here')); ?></span>
                </div>
              </div>
              [<?php echo e(trans('admin.you_can_upload_1_image')); ?>]
              <br>
              <div class="uploaded-all-art-images">
                <?php if($art_update_data_by_id['art_img_url']): ?>
                <div class="art-image-single-container"><img class="img-responsive" src="<?php echo e($art_update_data_by_id['art_img_url']); ?>"><div data-id="<?php echo e($art_update_data_by_id['id']); ?>" class="remove-art-img-link"></div></div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
  <input type="hidden" name="ht_art_all_uploaded_images" id="ht_art_all_uploaded_images" value="<?php echo e($art_update_img_json); ?>">
  <input type="hidden" name="ht_art_upload_status" id="ht_art_upload_status" value="update">
</form>

<?php $__env->stopSection(); ?>