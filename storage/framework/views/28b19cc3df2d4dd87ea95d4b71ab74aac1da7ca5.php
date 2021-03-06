

<?php $__env->startSection('content'); ?>
<div class="py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div>
                <div class="card-header"><h3 class="font-weight-bolder text-primary"><?php echo e($message); ?></h3></div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="container mt-2">
                        <div class="row">                        
                            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $flag=1;   
                                ?>
                                <?php $__currentLoopData = $readBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $readBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($book->id == $readBook): ?>
                                        <?php
                                            $flag=0;
                                        ?>
                                        <?php break; ?>
                                    <?php else: ?>
                                        <?php
                                            $flag=1;
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($flag==0): ?>
                                    <div class="col-md-3 col-sm-6 pb-4">
                                        <div class="card card-block h-100"  style="position:relative">
                                            <img src="<?php echo e(asset('images/thumbnails/'.$book->thumbnail)); ?>" alt="<?php echo e($book->name); ?>" style="padding: 10px 15px 0px 15px">
                                            <div class="card-body text-primary">
                                                <h5 class="card-title ">
                                                    <b class=""><?php echo e(\Illuminate\Support\Str::limit($book->name, 20, $end='...')); ?></b>
                                                </h5>
                                                <p class="card-text" >
                                                    <b><?php echo e(\Illuminate\Support\Str::limit($book->author, 20, $end='...')); ?></b><br/>
                                                    <?php $__currentLoopData = $bookGenres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookGenre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($bookGenre->books_id == $book->id): ?>
                                                        <span class="badge badge-warning"><?php echo e($bookGenre->name); ?></span>
                                                    <?php endif; ?>                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                                </p>
                                                <div class="row justify-content-md-center">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-books')): ?>
                                                        <?php
                                                            $flag = 0;
                                                        ?>
                                                        <?php if(isset($readBooks)): ?>
                                                            <?php $__currentLoopData = $readBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $readBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($book->id == $readBook): ?>
                                                                    <?php 
                                                                        $flag = 1;
                                                                    ?>
                                                                    <?php break; ?>
                                                                <?php else: ?>
                                                                    <?php
                                                                        $flag = 0;   
                                                                    ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                        <?php if($status == 'read'): ?>
                                                            <div class="justify-content-md-center">
                                                                <div style="position:absolute;left:50%;bottom:5px;transform:translateX(-50%)">
                                                                    <form action="<?php echo e(route('userBooks.update',$book->id)); ?>" 
                                                                        method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('PUT'); ?>
                                                                        <input type="submit" 
                                                                        class= "btn btn-success align-self-center" 
                                                                        value="Mark as Unread" >
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="justify-content-md-center">
                                                                <div style="position:absolute;left:50%;bottom:5px;transform:translateX(-50%)">
                                                                    <form action="<?php echo e(route('userBooks.destroy',$book->id)); ?>"
                                                                        method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('delete'); ?>
                                                                        <input type="submit" class= "btn btn-primary" 
                                                                        value="Mark As Read">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>                                                                                               
                                                    <?php endif; ?>                                                
                                                </div>
                                            </div>                       
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                        </div>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eLibrary\resources\views/admin/users/readBooks.blade.php ENDPATH**/ ?>