<p class="h6 mb-4 mt-3">Ce formulaire est dédié à la création d'abonnements utilisateurs sur la plateforme Grand Public.
</p>

<form method="POST" action="{{ route('backoffice.subscription.store') }}" id="addSubscriptionForm">
    @csrf
    <div class="mb-3 custom-form-input">
        <label for="nameCreate" class="form-label">Nom</label>
        <input type="text" id="nameCreate" class="form-control" name="name" placeholder="Entrez son titre">
        <div class="alert alert-danger d-none" error-input="name"></div>
    </div>

    <div class="mb-3 custom-form-input">
        <label for="priceCreate" class="form-label">Prix</label>
        <input type="number" min="100" class="form-control" name="price" id="priceCreate" />
        <div class="alert alert-danger d-none" error-input="price"></div>
    </div>

    <div class="mb-3 custom-form-input">
        <label for="durationCreate" class="form-label">Durée (en mois)</label>
        <input type="number" step="1" min="1" class="form-control" name="duration" id="durationCreate" />
        <div class="alert alert-danger d-none" error-input="duration"></div>
    </div>

    <div class="mb-3 custom-form-input">
        <label for="short_descriptionCreate" class="form-label">Courte description</label>
        <textarea class="form-control" name="short_description" id="short_descriptionCreate" rows="3"></textarea>
        <div class="alert alert-danger d-none" error-input="short_description"></div>
    </div>


    <button type="submit" class="w-100 btn btn-primary btn-rounded mt-3">Créer</button>
</form>
