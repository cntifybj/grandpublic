@extends('backoffice.layouts.main')

@section('page_styles')
    <!-- Bootstrap DataTable -->
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('page_content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">Créer une notification</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card w-100 border shadow-none">
                            <div class="card-body">
                                <!-- Formulaire d'ajout-->
                                @include('backoffice.pages.app_notif.formAdd')
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 d-flex">
                        <div class="card w-100 border shadow-none">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="editableTable" class="display table-striped table-bordered table"
                                        cellspacing="0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Description</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('backoffice.pages.app_notif.deleteModal')

        <!-- Offcanvas d'édition -->
        @include('backoffice.pages.app_notif.formUpdate')
    </div>
@endsection

@section('page_scripts')
    <!-- DataTable -->
    <script src="{{ asset('assets/backoffice/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/plugin/datatables/dataTables.bootstrap5.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- JQuery Validate Plugin -->
    <script src="{{ asset('assets/backoffice/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

    <script>
        const FETCHDATAURL = "{{ route('backoffice.app_notifs.fetch_all') }}"
        const POST_NOTIF_ROUTE = "{{ route('backoffice.app_notifs.change-posted-status') }}"
    </script>

    <script src="{{ asset('assets/backoffice/js/pages/app_notif/index.js') }}"></script>
@endsection
