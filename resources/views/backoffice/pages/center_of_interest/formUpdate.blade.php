<div class="offcanvas offcanvas-end" tabindex="-1" id="editCenterOfInterest" aria-labelledby="editCenterOfInterestLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="editCenterOfInterestLabel">Formulaire de Modification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <p class="h6 mb-4 mt-3">Ce formulaire est dédié à la modification de centres d'intéret utilisateur sur la plateforme Grand
            Public.
        </p>

        <form method="POST" action="{{ route('backoffice.user.center_of_interest.store') }}" id="editCenterOfInterestForm">
            @csrf
            @method('PATCH')

            <div class="mb-3 custom-form-input">
                <label for="nameEdit" class="form-label">Nom</label>
                <input type="text" id="nameEdit" class="form-control" name="name" placeholder="Entrez son titre">
                <div class="alert alert-danger d-none" error-input="name"></div>
            </div>

            <div class="mb-3 custom-form-input">
                <label for="short_descriptionEdit" class="form-label">Courte description</label>
                <textarea class="form-control" name="short_description" id="short_descriptionEdit" rows="3"></textarea>
                <div class="alert alert-danger d-none" error-input="short_description"></div>
            </div>


            <button type="submit" class="w-100 btn btn-primary btn-rounded mt-3">Modifier</button>
        </form>


    </div>

</div>
