@extends('backoffice.layouts.main')

@section('page_styles')
    <!-- Bootstrap File Input CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/fileinput.min.css') }}" />

    <!-- Bootstrap DataTable -->
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('page_content')
    <div class="container mt-4">
        <div class="table-responsive">
            <table id="editableTable" class="display table table-striped table-bordered" cellspacing="0" style="width:100%">
                <thead>
                    <tr>
                        <th>Youtube Video Id</th>
                        <th>Video Thumbnail</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Description</th>
                        <th>Categorie</th>
                        <th>Premium</th>
                        <th>Mis en Avant</th>
                        <th>Prix unique</th>
                        <th>Date de Publication en accès gratuit</th>
                        <th>Aperçu</th>
                        <th>Date de Publication</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <!-- Offcanvas d'édition -->
        @include('backoffice.pages.video.formUpdate')

        <!-- Modal de suppression -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Suppression de la vidéo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer cette vidéo ? Cette action est irréversible.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <!-- DataTable -->
    <script src="{{ asset('assets/backoffice/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/plugin/datatables/dataTables.bootstrap5.min.js') }}"></script>

    <!-- Bootstrap File Input JS -->
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/buffer.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/filetype.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-fileinput/fileinput.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- JQuery Validate Plugin -->
    <script src="{{ asset('assets/backoffice/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

    <script>
        const FETCHDATAURL = "{{ route('backoffice.video.fetch_all') }}"
    </script>

    <script src="{{ asset('assets/backoffice/js/pages/video/index.js') }}"></script>
@endsection
