<?php $__env->startSection('page_styles'); ?>
    <!-- Bootstrap DataTable -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/backoffice/css/dataTables.bootstrap5.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_content'); ?>
    <div class="container mt-4">
        <div class="table-responsive">
            <table id="editableTable" class="display table table-striped table-bordered" cellspacing="0" style="width:100%">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Montant Payé (XOF)</th>
                        <th>Début Abonnement</th>
                        <th>Fin Abonnement</th>
                        <th>Durée Abonnement</th>
                        <th>Status Abonnement</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('page_scripts'); ?>
        <!-- DataTable -->
        <script src="<?php echo e(asset('assets/backoffice/js/plugin/datatables/datatables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/backoffice/js/plugin/datatables/dataTables.bootstrap5.min.js')); ?>"></script>

        <script>
            const FETCHDATAURL = "<?php echo e(route('backoffice.user_subscription.fetch_all')); ?>"
        </script>

        <script src="<?php echo e(asset('assets/backoffice/js/pages/user_subscription/index.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/pages/user_subscription/index.blade.php ENDPATH**/ ?>