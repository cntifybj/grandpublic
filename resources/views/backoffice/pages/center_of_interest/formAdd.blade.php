<p class="h6 mb-4 mt-3">Ce formulaire est dédié à la création de centres d'intérêt utilisateur sur la plateforme Grand Public.
</p>

<form method="POST" action="{{ route('backoffice.user.center_of_interest.store') }}" id="addCenterOfInterestForm">
    @csrf
    <div class="mb-3 custom-form-input">
        <label for="nameCreate" class="form-label">Nom</label>
        <input type="text" id="nameCreate" class="form-control" name="name" placeholder="Entrez son titre">
        <div class="alert alert-danger d-none" error-input="name"></div>
    </div>

    <div class="mb-3 custom-form-input">
        <label for="short_descriptionCreate" class="form-label">Courte description</label>
        <textarea class="form-control" name="short_description" id="short_descriptionCreate" rows="3"></textarea>
        <div class="alert alert-danger d-none" error-input="short_description"></div>
    </div>


    <button type="submit" class="w-100 btn btn-primary btn-rounded mt-3">Créer</button>
</form>
