<div class="offcanvas offcanvas-end" tabindex="-1" id="editStaffMember" aria-labelledby="editStaffMemberLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="editStaffMemberLabel">Formulaire de Mise à jour</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <p class="h6 mb-4 mt-3">Ce formulaire est dédié à la mise à jour de comptes Administrateurs</p>

        <form method="POST" id="editStaffMemberForm">
            <?php echo method_field('PATCH'); ?>
            <?php echo csrf_field(); ?>
            <div class="mb-3 custom-form-input">
                <label for="nameEdit" class="form-label">Nom</label>
                <input type="text" id="nameEdit" class="form-control" name="name" placeholder="Entrez son nom">
                <div class="alert alert-danger" error-input="name"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="roleEdit">Rôle</label>
                <select class="form-select"id="roleEdit" name="role">
                    <option value="">Sélectionner un rôle</option>
                    <option value="editor">Editeur</option>
                    <option value="moderator">Modérateur</option>
                    <option value="super_admin">Super Administrateur</option>
                </select>
                <div class="alert alert-danger" error-input="role"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="passwordEdit" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <input type="password" id="passwordEdit" class="form-control" name="password"
                        placeholder="Entrez son mot de passe">
                    <button class="btn btn-outline-secondary togglePassword" type="button">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <div class="alert alert-danger" error-input="password"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="suspendedEdit">Suspendre ce compte</label>
                    <input class="form-check-input" type="checkbox" name="suspended" id="suspendedEdit" />
                </div>
                <div class="alert alert-danger" error-input="suspended"></div>
            </div>


            <button type="submit" class="w-100 btn btn-primary btn-rounded mt-3">Modifier</button>
        </form>
    </div>
</div>
</div>
<?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/pages/staff/formUpdate.blade.php ENDPATH**/ ?>