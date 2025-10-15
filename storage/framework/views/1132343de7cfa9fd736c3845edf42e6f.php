<div class="offcanvas offcanvas-end" tabindex="-1" id="editSlide" aria-labelledby="editSlideLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="editSlideLabel">Formulaire de Modification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <p class="h6 mb-4 mt-3 text-dark">Ce formulaire est dédié à la modification de slides sur la plateforme Grand
            Public.
        </p>

        <form method="POST" id="editSlideForm" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>

            <div class="mb-3 custom-form-input">
                <label for="imageEdit" class="form-label">Image de la slide <span class="text-danger">*</span></label>
                <input id="imageEdit" name="image" type="file" class="file" data-show-preview="false"
                    data-msg-placeholder="Sélectionner l'image...">

                <div class="alert alert-danger" error-input="image"></div>
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

            <div class="mb-3 custom-form-input">
                <label for="headerEdit" class="form-label">Grand Titre (Optionnel)</label>
                <input type="text" id="headerEdit" class="form-control" name="header"
                    placeholder="Entrez son titre">

                <div class="alert alert-danger" error-input="header"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="textEdit" class="form-label">Texte (Optionnel)</label>
                <textarea class="form-control" name="text" id="textEdit" rows="4"></textarea>

                <div class="alert alert-danger" error-input="text"></div>
            </div>

            <button type="submit" class="btn btn-primary">Modifier la slide</button>
            <button class="btn btn-secondary ms-3" data-bs-dismiss="offcanvas" aria-label="Close">Annuler</button>
        </form>

    </div>

</div>
<?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/pages/slide/formUpdate.blade.php ENDPATH**/ ?>