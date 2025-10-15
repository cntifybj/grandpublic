<?php $__env->startSection('page_styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backoffice/css/dataTables.bootstrap5.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_content'); ?>
    <div class="container mt-4">
        <button class="btn btn-primary mb-3" data-bs-toggle="offcanvas" data-bs-target="#addStaffMember"
            aria-controls="addStaffMember">Add a member&ensp;<i class="fa fa-plus"></i></button>
        <div class="table-responsive">
            <table id="editableTable" class="display table table-striped table-bordered" cellspacing="0" style="width:100%">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Status du compte</th>
                        <th>Membre depuis</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Offcanvas d'ajout-->
        <?php echo $__env->make('backoffice.pages.staff.formAdd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Offcanvas d'édition -->
        <?php echo $__env->make('backoffice.pages.staff.formUpdate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('page_scripts'); ?>
        <script src="<?php echo e(asset('assets/backoffice/js/plugin/datatables/datatables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/backoffice/js/plugin/datatables/dataTables.bootstrap5.min.js')); ?>"></script>

        <!-- Bootstrap Notify -->
        <script src="<?php echo e(asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>


        <!-- JQuery Validate Plugin -->
        <script src="<?php echo e(asset('assets/backoffice/js/plugin/jquery.validate/jquery.validate.min.js')); ?>"></script>

        <script>
            const FETCHDATAURL = "<?php echo e(route('backoffice.staff.fetch_all')); ?>"
        </script>

        <script src="<?php echo e(asset('assets/backoffice/js/pages/staff/index.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/pages/staff/index.blade.php ENDPATH**/ ?>