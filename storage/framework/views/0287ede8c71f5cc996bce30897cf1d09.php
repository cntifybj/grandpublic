<?php $__env->startSection('page_styles'); ?>
    <style>
        .sortable-placeholder {
            background-color: #f8d7da;
            border: 2px dashed #dc3545;
            height: 130px;
            border-radius: 4px;
            opacity: 0.7;
        }

        /* Style pour une liste vide */
        .empty-list {
            min-height: 50px;
            /* Taille minimale pour bien voir la liste vide */
            background-color: #f8f9fa;
            /* Couleur de fond pour l'espace vide */
            border: 2px dashed #ced4da;
            /* Bordure en pointillés pour indiquer que la liste est vide */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Message d'une liste vide */
        .empty-list:before {
            content: 'Liste vide';
            color: #6c757d;
            font-style: italic;
        }

        /* Quand la liste reçoit des éléments */
        .list-group-item {
            border: 1px solid #ddd;
            margin-bottom: 5px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_content'); ?>
    <div class="container mt-4">

        <form method="post" id="sortable-form">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h5>Vidéos visibles</h5>
                    <ul id="visibles" class="list-group">
                        <?php $__currentLoopData = $visible_slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-center align-items-center">
                                <div class="slide" slide-id="<?php echo e($slide->id); ?>">
                                    <img src="<?php echo e(Storage::url($slide->image)); ?>" alt="<?php echo e($slide->header); ?>" class="img-thumbnail"
                                        style="height: 120px;">
                                    <i class="ms-3 fas fa-arrows-alt"></i>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h5>Vidéos masquées</h5>
                    <ul id="hiddens" class="list-group">
                        <?php $__currentLoopData = $not_visible_slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-center align-items-center">
                                <div class="slide" slide-id="<?php echo e($slide->id); ?>">
                                    <img src="<?php echo e(Storage::url($slide->image)); ?>" alt="<?php echo e($slide->header); ?>" class="img-thumbnail"
                                        style="height: 120px;">
                                    <i class="ms-3 fas fa-arrows-alt"></i>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Enregistrer l'ordre</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_scripts'); ?>
    <!-- Bootstrap Notify -->
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>

    <!-- Sortable.js -->
    <script src="<?php echo e(asset('assets/backoffice/js/plugin/sortable/sortable.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/backoffice/js/pages/slide/sort.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/pages/slide/sort.blade.php ENDPATH**/ ?>