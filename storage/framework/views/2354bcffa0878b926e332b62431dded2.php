<?php $__env->startSection('page_styles'); ?>
    <!-- Bootstrap File Input CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/backoffice/css/fileinput.min.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_content'); ?>
    <div class="container px-5">
        <h5 class="text-center mb-5 h3">Formulaire de Création</h5>

        <p class="h6 mb-4 mt-3">Ce formulaire est dédié à la création de vidéos sur la plateforme Grand Public.
            <br>Par ailleurs, veuillez noter que vous serez automatiquement l'auteur de cette vidéo.
        </p>
        <p class="text-danger mb-4">
            Important: Les vidéos doivent préalablement existées sur Youtube.
        </p>

        <form method="POST" action="<?php echo e(route('backoffice.videos.store')); ?>" id="addVideoForm" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-3 custom-form-input">
                <label for="youtube_idCreate" class="form-label">Lien de la vidéo Youtube</label>
                <input type="text" id="youtube_idCreate" class="form-control" name="youtube_id"
                    placeholder="youtube.com/watch?v=XXXXXXXXXXX">
                <div class="alert alert-danger" error-input="youtube_id"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="titleCreate" class="form-label">Titre</label>
                <input type="text" id="titleCreate" class="form-control" name="title" placeholder="Entrez son titre">
                <div class="alert alert-danger" error-input="title"></div>
            </div>


            <!-- Conteneur pour l'image de l'aperçu de la vidéo -->
            <div id="videoThumbnailPreviewContainer" class="mb-3 d-none">
                <label class="form-label me-5">Aperçu de la vidéo :</label>
                <p class="form-text text-muted text-info">Cette miniature ne vous convient pas ? Vous pouvez
                    la changer dans la section qui suit.</p>

                <img id="videoThumbnailPreview" src="" alt="Aperçu de la vidéo" class="img-fluid">
            </div>


            <div class="mb-3 custom-form-input">
                <label for="video_thumbnailCreate" class="form-label">Miniature de la vidéo</label>

                <input id="video_thumbnailCreate" name="video_thumbnail" type="file" class="file"
                    data-show-preview="false" data-msg-placeholder="Sélectionner l'image à mettre en miniature...">

                <div class="alert alert-danger" error-input="video_thumbnail"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="categoryCreate">Catégorie</label>
                <select class="form-select"id="categoryCreate" name="category">
                    <option selected value="">Sélectionner la catégorie de la vidéo</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->value); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="alert alert-danger" error-input="category"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="descriptionCreate" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="descriptionCreate" rows="4"></textarea>
                <div class="alert alert-danger" error-input="description"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="highlighted" class="form-label">À mettre en avant</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="highlighted" id="highlighted_1Create"
                        value="1" />
                    <label class="form-check-label" for="highlighted_1Create">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="highlighted" id="highlighted_0Create"
                        checked="" value="0" />
                    <label class="form-check-label" for="highlighted_0Create">Non</label>
                </div>

                <div class="alert alert-danger" error-input="highlighted"></div>
            </div>


            <div class="mb-3 custom-form-input">

                <label for="publication_dateCreate" class="form-label">Date de Publication</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="set_publication_date"
                        id="set_publication_date_manualCreate" checked="" value="manual">
                    <label class="form-check-label" for="set_publication_date_manualCreate">Définir la date de
                        publication</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="set_publication_date"
                        id="set_publication_date_automaticCreate"value="automatic">
                    <label class="form-check-label" for="set_publication_date_automaticCreate">Publié maintenant</label>
                </div>

                <input type="datetime-local" id="publication_dateCreate" class="form-control" name="publication_date"
                    placeholder="Entrez sa date de publication">

                <div class="alert alert-danger" error-input="publication_date"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="premium_video" class="form-label">Type de vidéo</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="premium_video" id="premium_video_1Create"
                        value="1" checked="" />
                    <label class="form-check-label" for="premium_video_1Create">Payante</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="premium_video" id="premium_video_0Create"
                        value="0" />
                    <label class="form-check-label" for="premium_video_0Create">Gratuite</label>
                </div>

                <div class="alert alert-danger" error-input="premium_video"></div>
            </div>

            <div class="dependPremiumValue">

                <div class="mb-3 custom-form-input">
                    <label for="single_priceCreate" class="form-label">Prix Unique</label>

                    <input type="number" class="form-control" name="single_price" id="single_priceCreate"
                        aria-describedby="single_priceHelp" placeholder="Entrez ici le prix" min="0"
                        step="1" />

                    <small id="single_priceHelp" class="form-text text-muted">Ce prix représente le prix qui sera
                        demandé
                        aux utilisateurs n'ayant pas d'abonnement actif mais souhaitant quand même regarder la
                        vidéo.</small>

                    <div class="alert alert-danger" error-input="single_price"></div>
                </div>


                <div class="mb-3 custom-form-input">

                    <label for="date_time_to_offer_free_accessCreate" class="form-label">Date de Publication en libre
                        accès</label>

                    <input type="datetime-local" id="date_time_to_offer_free_accessCreate" class="form-control"
                        name="date_time_to_offer_free_access" aria-describedby="date_time_to_offer_free_accessCreateHelp"
                        placeholder="Entrez sa date de publication">

                    <small id="date_time_to_offer_free_accessCreateHelp" class="form-text text-muted">Définisser ici
                        le
                        jour et l'heure à laquelle vous voulez rendre cette vidéo gratuite sur la plateforme.</small>

                    <div class="alert alert-danger" error-input="date_time_to_offer_free_access"></div>
                </div>


                <div class="mb-3 custom-form-input">

                    <label for="video_previewCreate" class="form-label">Aperçu Vidéo</label>

                    <input id="video_previewCreate" name="video_preview" type="file" class="file"
                        data-show-preview="false" data-msg-placeholder="Sélectionner la vidéo d'aperçu...">

                    <small id="video_previewCreateHelp" class="form-text text-muted">Cette vidéo sera présenté aux
                        utilisateurs de la plateforme Grand Public pour qu'ils aient un aperçu </small>

                    <div class="alert alert-danger" error-input="video_preview"></div>
                </div>

            </div>

            <button type="submit" class="w-100 btn btn-primary btn-rounded mt-3">Créer</button>
        </form>

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

    <script src="<?php echo e(asset('assets/backoffice/js/pages/video/create.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/pages/video/create.blade.php ENDPATH**/ ?>