@extends('backoffice.layouts.main')

@section('page_styles')
    <!-- Bootstrap File Input CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/fileinput.min.css') }}" />
@endsection

@section('page_content')
    <div class="container px-5">
        <h5 class="text-center mb-5 h3">Formulaire de Création</h5>

        <p class="h6 mb-4 mt-3 text-dark">Ce formulaire est dédié à la création de slides sur la plateforme Grand Public.
        </p>

        <form method="POST" action="{{ route('backoffice.slides.store') }}" id="addSlideForm" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 custom-form-input">
                <label for="imageCreate" class="form-label">Image de la slide <span class="text-danger">*</span></label>
                <input id="imageCreate" name="image" type="file" class="file" data-show-preview="false"
                    data-msg-placeholder="Sélectionner l'image...">

                <div class="alert alert-danger" error-input="image"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="visible" class="form-label">Visible</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="visible" id="visible_1Create"
                        value="1" />
                    <label class="form-check-label" for="visible_1Create">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="visible" id="visible_0Create"
                        checked="" value="0" />
                    <label class="form-check-label" for="visible_0Create">Non</label>
                </div>

                <div class="alert alert-danger" error-input="visible"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="headerCreate" class="form-label">Grand Titre (Optionnel)</label>
                <input type="text" id="headerCreate" class="form-control" name="header" placeholder="Entrez son titre">

                <div class="alert alert-danger" error-input="header"></div>
            </div>


            <div class="mb-3 custom-form-input">
                <label for="textCreate" class="form-label">Texte (Optionnel)</label>
                <textarea class="form-control" name="text" id="textCreate" rows="4"></textarea>

                <div class="alert alert-danger" error-input="text"></div>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter la slide</button>
            <button type="reset" class="btn btn-secondary ms-3">Annuler</button>
        </form>

    </div>
@endsection

@section('page_scripts')
    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>


    <!-- Bootstrap File Input JS -->
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/buffer.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/filetype.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/fileinput.min.js') }}"></script>


    <!-- JQuery Validate Plugin -->
    <script src="{{ asset('assets/backoffice/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('assets/backoffice/js/pages/slide/create.js') }}"></script>
@endsection
