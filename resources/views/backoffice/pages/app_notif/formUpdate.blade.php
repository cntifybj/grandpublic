<div class="offcanvas offcanvas-end" tabindex="-1" id="editNotification" aria-labelledby="editNotificationLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="editNotificationLabel">Formulaire de Modification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <p class="h6 mb-4 mt-3">Ce formulaire est dédié à la modification des notifications sur l'application mobile Grand
            Public.
        </p>

        <form method="POST" action="{{ route('backoffice.app_notifs.store') }}" id="editNotificationForm">
            @csrf
            @method('PATCH')

            <div class="mb-3 custom-form-input">
                <label for="titleEdit" class="form-label">Titre</label>
                <input type="text" id="titleEdit" class="form-control" name="title" placeholder="Entrez son titre">
                <div class="alert alert-danger d-none" error-input="title"></div>
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
