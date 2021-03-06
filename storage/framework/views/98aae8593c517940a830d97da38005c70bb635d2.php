

<?php $__env->startSection('content'); ?>
<style>
    input{
        border:none;
    }
</style>

<div class="container-contact100">
    <div class="wrap-contact100">
      <form class="contact100-form validate-form" method="POST" action="<?php echo e(route('books.update',$book->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <span class="contact100-form-title">
          Edit: <span class="text-primary font-weight-bolder"><?php echo e($book->name); ?></span>
        </span>
        
        <label class="text-primary h6 font-weight-bolder">ISBN:</label>
        <div class="wrap-input100 validate-input" data-validate="ISBN is required">
          <input class="input100" id="isbn" type="text" name="isbn" placeholder="ISBN" value="<?php echo e($book->isbn); ?>">
          <label class="label-input100" for="name">
            <span class="text-danger font-weight-bolder">*</span>
          </label>
        </div>
        <?php $__errorArgs = ['isbn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text text-danger"><?php echo e($errors->first('isbn')); ?></span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <label class="text-primary h6 font-weight-bolder">Name:</label>
        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <input class="input100" id="name" type="text" name="name" placeholder="Name" value="<?php echo e($book->name); ?>">
          <label class="label-input100" for="name">
            <span class="text-danger font-weight-bolder">*</span>
          </label>
        </div>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text text-danger"><?php echo e($errors->first('name')); ?></span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <label class="text-primary h6 font-weight-bolder">Edition:</label>
        <div class="wrap-input100 validate-input" data-validate="Edition is required">
          <input class="input100" id="edition" type="text" name="edition" placeholder="Edition" value="<?php echo e($book->edition); ?>">
          <label class="label-input100" for="name">
            <span class="text-danger font-weight-bolder">*</span>
          </label>
        </div>
        <?php $__errorArgs = ['edition'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text text-danger"><?php echo e($errors->first('edition')); ?></span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        
        <label class="text-primary h6 font-weight-bolder">Author:</label>
        <div class="wrap-input100 validate-input" data-validate = "Author is required">
          <input class="input100" id="author" type="text" name="author" placeholder="Author" value="<?php echo e($book->author); ?>">
          <label class="label-input100" for="email">
            <span class="text-danger font-weight-bolder">*</span>
          </label>
        </div>
        <?php $__errorArgs = ['author'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text text-danger"><?php echo e($errors->first('author')); ?></span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  
        <label class="text-primary h6 font-weight-bolder">Length:</label>
        <div class="wrap-input100 validate-input" data-validate = "Length is required">            
          <input class="input100" id="length" type="text" name="length" placeholder="Length" value="<?php echo e($book->length); ?>">
          <label class="label-input100" for="phone">
            <span class="text-danger font-weight-bolder">*</span>
          </label>
        </div>
        <?php $__errorArgs = ['length'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text text-danger"><?php echo e($errors->first('length')); ?></span><br/>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <label class="h6 font-weight-bolder">Thumbnail</label>
        <div class="col-md-6 pb-4"><img src="<?php echo e(asset('images/thumbnails/'.$book->thumbnail)); ?>" height="100rem" class="card-img-top" alt="..."></div>                              
        <input type="file" name="thumbnail">     
        <div>
          <label class="h6 font-weight-bolder">Genre</label><br/>
            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $flag=0;    
                ?>
                <?php $__currentLoopData = $checkedGenres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkedGenre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($genre->name == $checkedGenre): ?>
                        <?php
                            $flag=1;   
                        ?>
                        <?php break; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($flag == 1): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="<?php echo e($genre->id); ?>" checked>
                        <label class="form-check-label" for="inlineCheckbox1"><?php echo e($genre->name); ?></label>
                    </div>
                <?php else: ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="<?php echo e($genre->id); ?>" >
                        <label class="form-check-label" for="inlineCheckbox1"><?php echo e($genre->name); ?></label>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </div>
  
        <div class="container-contact100-form-btn">
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <button type="submit" class="contact100-form-btn btn-primary">
              Update
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  
  
  
  <div id="dropDownSelect1"></div>
  
  <!--===============================================================================================-->
  <script src="<?php echo e(asset('forms/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo e(asset('forms/vendor/animsition/js/animsition.min.js')); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo e(asset('forms/vendor/bootstrap/js/popper.js')); ?>"></script>
  <script src="<?php echo e(asset('forms/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo e(asset('forms/vendor/select2/select2.min.js')); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo e(asset('forms/vendor/daterangepicker/moment.min.js')); ?>"></script>
  <script src="<?php echo e(asset('forms/vendor/daterangepicker/daterangepicker.js')); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo e(asset('forms/vendor/countdowntime/countdowntime.js')); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo e(asset('forms/js/main.js')); ?>"></script>
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/admin/books/editBook.blade.php ENDPATH**/ ?>