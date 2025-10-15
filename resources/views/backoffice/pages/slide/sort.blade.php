@extends('backoffice.layouts.main')

@section('page_styles')
    <style>
        .sortable-placeholder {
            background-color: #f8d7da;
            border: 2px dashed #dc3545;
            height: 130px;
            border-radius: 4px;
            opacity: 0.7;
        }

        /* Style pour une liste vide */
        .empty-list {
            min-height: 50px;
            /* Taille minimale pour bien voir la liste vide */
            background-color: #f8f9fa;
            /* Couleur de fond pour l'espace vide */
            border: 2px dashed #ced4da;
            /* Bordure en pointillés pour indiquer que la liste est vide */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Message d'une liste vide */
        .empty-list:before {
            content: 'Liste vide';
            color: #6c757d;
            font-style: italic;
        }

        /* Quand la liste reçoit des éléments */
        .list-group-item {
            border: 1px solid #ddd;
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('page_content')
    <div class="container mt-4">

        <form method="post" id="sortable-form">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h5>Vidéos visibles</h5>
                    <ul id="visibles" class="list-group">
                        @foreach ($visible_slides as $slide)
                            <li class="list-group-item d-flex justify-content-center align-items-center">
                                <div class="slide" slide-id="{{ $slide->id }}">
                                    <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->header }}" class="img-thumbnail"
                                        style="height: 120px;">
                                    <i class="ms-3 fas fa-arrows-alt"></i>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-6">
                    <h5>Vidéos masquées</h5>
                    <ul id="hiddens" class="list-group">
                        @foreach ($not_visible_slides as $slide)
                            <li class="list-group-item d-flex justify-content-center align-items-center">
                                <div class="slide" slide-id="{{ $slide->id }}">
                                    <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->header }}" class="img-thumbnail"
                                        style="height: 120px;">
                                    <i class="ms-3 fas fa-arrows-alt"></i>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Enregistrer l'ordre</button>
        </form>
    </div>
@endsection

@section('page_scripts')
    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Sortable.js -->
    <script src="{{ asset('assets/backoffice/js/plugin/sortable/sortable.min.js') }}"></script>

    <script src="{{ asset('assets/backoffice/js/pages/slide/sort.js') }}"></script>
@endsection
