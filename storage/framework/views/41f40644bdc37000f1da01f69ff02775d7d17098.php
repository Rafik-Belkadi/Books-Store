<?php $__env->startSection('add-new-art-content'); ?>

<?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.add_new_art')); ?> &nbsp;&nbsp;<a class="btn btn-default btn-xs" href="<?php echo e(route('admin.clipart_list_content')); ?>"><?php echo e(trans('admin.art_lists')); ?></a></h3>
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
            <label class="col-sm-4 control-label pull-left" for="inputArtName"><?php echo e(trans('admin.art_name')); ?></label>
            <div class="col-sm-8">
              <input type="text" placeholder="<?php echo e(trans('admin.art_name')); ?>" id="inputArtName" name="inputArtName" class="form-control">
            </div>
          </div>  
          <div class="form-group">
            <label class="col-sm-4 control-label pull-left" for="inputSelectCategory"><?php echo e(trans('admin.select_category')); ?> </label>
            <div class="col-sm-8">
              <select name="inputSelectCategory" id="inputSelectCategory" class="form-control select2" style="width: 100%;">
                <?php if(count($getArtCatByFilter)>0): ?>
                  <?php $__currentLoopData = $getArtCatByFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <option value="<?php echo e($row['term_id']); ?>"><?php echo $row['name']; ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label pull-left" for="inputArtStatus"><?php echo e(trans('admin.art_status')); ?></label>
            <div class="col-sm-8">
              <select name="inputArtStatus" id="inputArtStatus" class="form-control select2" style="width: 100%;">
                <option value="1"><?php echo e(trans('admin.enable')); ?></option>
                <option value="0"><?php echo e(trans('admin.disable')); ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label pull-left" for="inputCategoryName"><?php echo e(trans('admin.upload_your_art_image')); ?></label>
            <div class="col-sm-8">
              <div class="uploadform dropzone no-margin dz-clickable art-dropzone-file-upload" id="art_dropzone_file_upload" name="art_dropzone_file_upload">
                <div class="dz-default dz-message">
                  <span><?php echo e(trans('admin.drop_your_cover_picture_here')); ?></span>
                </div>
              </div>
              [<?php echo e(trans('admin.you_can_upload_10_image')); ?>]
              <br>
              <div class="uploaded-all-art-images"></div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
  <input type="hidden" name="ht_art_all_uploaded_images" id="ht_art_all_uploaded_images" value="">
  <input type="hidden" name="ht_art_upload_status" id="ht_art_upload_status" value="new_add">
</form>

<?php $__env->stopSection(); ?>