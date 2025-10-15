<?php $__env->startSection('page_styles'); ?>
    <!-- Bootstrap File Input CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/backoffice/css/fileinput.min.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_content'); ?>
    <div class="container mt-4">
        <div class="row">
            <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card" slide-id="<?php echo e($slide->id); ?>">
                        <img src="<?php echo e(Storage::url($slide->image)); ?>" class="card-img-top" alt="<?php echo e($slide->header); ?>">
                        <div class="card-body">
                            <p class="fs-6 mb-1 text-info">
                                Position : <span class="slide-position"><?php echo e($slide->position); ?></span>
                                &ensp; | &ensp;
                                Status de visibilité : <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'ms-2 badge rounded-pill visibility-status' => true,
                                    'text-bg-success' => $slide->visible,
                                    'text-bg-warning' => !$slide->visible,
                                ]); ?>">
                                    <?php if($slide->visible): ?>
                                        Visible
                                    <?php else: ?>
                                        Masqué
                                    <?php endif; ?>
                                </span>
                            </p>
                            <h3 class="card-title">
                                <?php echo e($slide->header); ?>

                            </h3>
                            <p class="card-text">
                                <?php echo e($slide->text); ?>

                            </p>
                            <button type="button" class="btn btn-dark btn-rounded btn-sm" data-bs-toggle="offcanvas"
                                data-bs-target="#editSlide" aria-controls="editSlide">Modifier</button>
                            <button type="button" class="btn btn-danger btn-rounded btn-sm">Supprimer</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Offcanvas d'édition -->
        <?php echo $__env->make('backoffice.pages.slide.formUpdate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_scripts'); ?>
    <!-- Bootstrap Notify -->
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>

    <!-- Bootstrap File Input JS -->
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/bootstrap-fileinput/buffer.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/bootstrap-fileinput/filetype.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/bootstrap-fileinput/fileinput.min.js')); ?>"></script>

    <!-- JQuery Validate Plugin -->
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/jquery.validate/jquery.validate.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/backoffice/js/pages/slide/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/pages/slide/index.blade.php ENDPATH**/ ?>