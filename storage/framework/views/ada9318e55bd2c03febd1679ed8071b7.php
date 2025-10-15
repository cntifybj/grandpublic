<div class="offcanvas offcanvas-end" tabindex="-1" id="editAdvisory" aria-labelledby="editAdvisoryLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="editAdvisoryLabel">Formulaire de Modification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <p class="h6 mb-4 mt-3">Ce formulaire est dédié à la modification de publicités sur la plateforme Grand Public.
        </p>

        <!-- Conteneur pour la prévisualisation du fichier -->
        <div class="mb-4" id="previewContainer">
            <h6>Aperçu du fichier publicitaire</h6>
            <!-- Image -->
            <img id="previewImage" src="" alt="Aperçu de l'image publicitaire" class="img-fluid d-none" />

            <!-- Vidéo -->
            <video id="previewVideo" class="video-js vjs-default-skin d-none" controls preload="auto" width="320"
                height="auto"></video>
        </div>

        <form method="POST" id="editAdvisoryForm" enctype="multipart/form-data">
            <?php echo method_field('PATCH'); ?>
            <?php echo csrf_field(); ?>
            <div class="mb-3 custom-form-input">
                <label for="titleEdit" class="form-label">Titre</label>
                <input type="text" id="titleEdit" class="form-control" name="title" placeholder="Entrez son titre">
                <div class="alert alert-danger" error-input="title"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="positionEdit">Position</label>
                <select class="form-select" id="positionEdit" name="position">
                    <option selected value="">Sélectionner la catégorie de la vidéo</option>
                    <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($position->value); ?>" in-video="<?php echo e($position->inVideo()); ?>">
                            <?php echo e($position->label()); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="alert alert-danger" error-input="position"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="isVideo" class="form-label">Vidéo ou Image</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isVideo" id="isVideo_1Edit" value="1" />
                    <label class="form-check-label" for="isVideo_1Edit">Vidéo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isVideo" id="isVideo_0Edit" checked=""
                        value="0" />
                    <label class="form-check-label" for="isVideo_0Edit">Image</label>
                </div>

                <div class="alert alert-danger" error-input="isVideo"></div>
            </div>


            <div class="mb-3 custom-form-input">

                <label for="fileEdit" class="form-label">Fichier Publicitaire</label>

                <input id="fileEdit" name="file" type="file" class="file" data-show-preview="false"
                    data-msg-placeholder="Sélectionner le fichier d'aperçu...">

                <div class="alert alert-danger" error-input="file"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="visible" class="form-label">Visible</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="visible" id="visible_1Edit" value="1" />
                    <label class="form-check-label" for="visible_1Edit">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="visible" id="visible_0Edit" checked=""
                        value="0" />
                    <label class="form-check-label" for="visible_0Edit">Non</label>
                </div>

                <div class="alert alert-danger" error-input="visible"></div>
            </div>

            <button type="submit" class="w-100 btn btn-primary btn-rounded mt-3">Modifier</button>
        </form>

    </div>
</div>
<?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/pages/advisory/formUpdate.blade.php ENDPATH**/ ?>