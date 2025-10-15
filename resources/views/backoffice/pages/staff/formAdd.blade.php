<div class="offcanvas offcanvas-end" tabindex="-1" id="addStaffMember" aria-labelledby="addStaffMemberLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="addStaffMemberLabel">Formulaire de Création</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <p class="h6 mb-4 mt-3">Ce formulaire est dédié à la création de comptes Administrateurs</p>

        <form method="POST" action="{{ route('backoffice.staff.store') }}" id="addStaffMemberForm">
            @csrf
            <div class="mb-3 custom-form-input">
                <label for="nameCreate" class="form-label">Nom</label>
                <input type="text" id="nameCreate" class="form-control" name="name" placeholder="Entrez son nom">
                <div class="alert alert-danger" error-input="name"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="roleCreate">Rôle</label>
                <select class="form-select"id="roleCreate" name="role">
                    <option selected value="">Sélectionner un rôle</option>
                    <option value="editor">Editeur</option>
                    <option value="moderator">Modérateur</option>
                    <option value="super_admin">Super Administrateur</option>
                </select>
                <div class="alert alert-danger" error-input="role"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="emailCreate" class="form-label">Email</label>
                <input type="email" id="emailCreate" class="form-control" name="email"
                    placeholder="Entrez son adresse mail">
                <div class="alert alert-danger" error-input="email"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="passwordCreate" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <input type="password" id="passwordCreate" class="form-control" name="password"
                        placeholder="Entrez son mot de passe">
                    <button class="btn btn-outline-secondary togglePassword" type="button">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <div class="alert alert-danger" error-input="password"></div>
            </div>

            <button type="submit" class="w-100 btn btn-primary btn-rounded mt-3">Créer</button>
        </form>
    </div>
</div>
</div>
