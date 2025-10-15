<p class="h6 mb-4 mt-3">Ce formulaire est dédié à la création de notification sur l'application mobile Grand Public.
</p>

<form method="POST" action="{{ route('backoffice.app_notifs.store') }}" id="addNotificationForm">
    @csrf
    <div class="mb-3 custom-form-input">
        <label for="titleCreate" class="form-label">Titre</label>
        <input type="text" id="titleCreate" class="form-control" name="title" placeholder="Entrez son titre">
        <div class="alert alert-danger d-none" error-input="title"></div>
    </div>

    <div class="mb-3 custom-form-input">
        <label for="short_descriptionCreate" class="form-label">Courte description</label>
        <textarea class="form-control" name="short_description" id="short_descriptionCreate" rows="3"></textarea>
        <div class="alert alert-danger d-none" error-input="short_description"></div>
    </div>


    <button type="submit" class="w-100 btn btn-primary btn-rounded mt-3">Créer</button>
</form>
