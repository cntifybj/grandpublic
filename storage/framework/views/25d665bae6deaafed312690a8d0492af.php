<div class="offcanvas offcanvas-end" tabindex="-1" id="editVideo" aria-labelledby="editVideoLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="editVideoLabel">Formulaire de Modification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <p class="h6 mb-4 mt-3">Ce formulaire est dédié à la modification de vidéos sur la plateforme Grand Public.
            <br>Par ailleurs, veuillez noter que vous serez automatiquement l'auteur de cette vidéo.
        </p>
        <p class="text-danger text-center">
            Important: Les vidéos doivent préalablement existées sur Youtube.
        </p>

        <form id="editVideoForm" enctype="multipart/form-data">
            <?php echo method_field('PATCH'); ?>
            <?php echo csrf_field(); ?>
            <div class="mb-3 custom-form-input">
                <label for="youtube_idEdit" class="form-label">Lien de la vidéo Youtube</label>
                <input type="text" id="youtube_idEdit" class="form-control" name="youtube_id"
                    placeholder="youtube.com/watch?v=XXXXXXXXXXX">
                <div class="alert alert-danger" error-input="youtube_id"></div>
            </div>

            <!-- Conteneur pour l'image de l'aperçu de la vidéo -->
            <div id="videoThumbnailPreviewContainer" class="mb-3">
                <label class="form-label me-5">Aperçu de la vidéo :</label>
                <p class="form-text text-muted text-info">Cette miniature ne vous convient pas ? Vous pouvez
                    la changer dans la section qui suit.</p>

                <img id="videoThumbnailPreview" src="" alt="Aperçu de la vidéo" class="img-fluid">
            </div>


            <div class="mb-3 custom-form-input">
                <label for="video_thumbnailEdit" class="form-label">Miniature de la vidéo</label>

                <input id="video_thumbnailEdit" name="video_thumbnail" type="file" class="file"
                    data-show-preview="false" data-msg-placeholder="Sélectionner l'image à mettre en miniature...">

                <div class="alert alert-danger" error-input="video_thumbnail"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="titleEdit" class="form-label">Titre</label>
                <input type="text" id="titleEdit" class="form-control" name="title" placeholder="Entrez son titre">
                <div class="alert alert-danger" error-input="title"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="categoryEdit">Catégorie</label>
                <select class="form-select"id="categoryEdit" name="category">
                    <option selected value="">Sélectionner la catégorie de la vidéo</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->value); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="alert alert-danger" error-input="category"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="descriptionEdit" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="descriptionEdit" rows="4"></textarea>
                <div class="alert alert-danger" error-input="description"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="highlighted" class="form-label">À mettre en avant</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="highlighted" id="highlighted_1Edit"
                        value="1" />
                    <label class="form-check-label" for="highlighted_1Edit">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="highlighted" id="highlighted_0Edit"
                        checked="" value="0" />
                    <label class="form-check-label" for="highlighted_0Edit">Non</label>
                </div>

                <div class="alert alert-danger" error-input="highlighted"></div>
            </div>


            <div class="mb-3 custom-form-input">

                <label for="publication_dateEdit" class="form-label">Date de Publication</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="set_publication_date"
                        id="set_publication_date_manualEdit" checked="" value="manual">
                    <label class="form-check-label" for="set_publication_date_manualEdit">Définir la date de
                        publication</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="set_publication_date"
                        id="set_publication_date_automaticEdit"value="automatic">
                    <label class="form-check-label" for="set_publication_date_automaticEdit">Publié maintenant</label>
                </div>

                <input type="datetime-local" id="publication_dateEdit" class="form-control" name="publication_date"
                    placeholder="Entrez sa date de publication">

                <div class="alert alert-danger" error-input="publication_date"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="premium_video" class="form-label">Type de vidéo</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="premium_video" id="premium_video_1Edit"
                        value="1" checked="" />
                    <label class="form-check-label" for="premium_video_1Edit">Payante</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="premium_video" id="premium_video_0Edit"
                        value="0" />
                    <label class="form-check-label" for="premium_video_0Edit">Gratuite</label>
                </div>

                <div class="alert alert-danger" error-input="premium_video"></div>
            </div>

            <div class="dependPremiumValue">

                <div class="mb-3 custom-form-input">
                    <label for="single_priceEdit" class="form-label">Prix Unique</label>

                    <input type="number" class="form-control" name="single_price" id="single_priceEdit"
                        aria-describedby="single_priceHelp" placeholder="Entrez ici le prix" min="0"
                        step="1" />

                    <small id="single_priceHelp" class="form-text text-muted">Ce prix représente le prix qui sera
                        demandé
                        aux utilisateurs n'ayant pas d'abonnement actif mais souhaitant quand même regarder la
                        vidéo.</small>

                    <div class="alert alert-danger" error-input="single_price"></div>
                </div>


                <div class="mb-3 custom-form-input">

                    <label for="date_time_to_offer_free_accessEdit" class="form-label">Date de Publication en libre
                        accès</label>

                    <input type="datetime-local" id="date_time_to_offer_free_accessEdit" class="form-control"
                        name="date_time_to_offer_free_access"
                        aria-describedby="date_time_to_offer_free_accessEditHelp"
                        placeholder="Entrez sa date de publication">

                    <small id="date_time_to_offer_free_accessEditHelp" class="form-text text-muted">Définisser ici
                        le
                        jour et l'heure à laquelle vous voulez rendre cette vidéo gratuite sur la plateforme.</small>

                    <div class="alert alert-danger" error-input="date_time_to_offer_free_access"></div>
                </div>

                <div class="mb-3 custom-form-input">

                    <label for="video_previewEdit" class="form-label">Aperçu</label>

                    <input id="video_previewEdit" name="video_preview" type="file" class="file"
                        data-show-preview="false" data-msg-placeholder="Sélectionner la vidéo d'aperçu...">

                    <small id="video_previewEditHelp" class="form-text text-muted">Cette vidéo sera présenté aux
                        utilisateurs de la plateforme Grand Public pour qu'ils aient un aperçu </small>

                    <div class="alert alert-danger" error-input="video_preview"></div>
                </div>

            </div>

            <button type="submit" class="w-100 btn btn-primary btn-rounded mt-3">Modifier</button>
        </form>

    </div>

</div>
<?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/pages/video/formUpdate.blade.php ENDPATH**/ ?>