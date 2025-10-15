@extends('backoffice.layouts.main')

@section('page_styles')
    <!-- Bootstrap DataTable -->
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('page_content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">Add Subscription</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <!-- Formulaire d'ajout-->
                                @include('backoffice.pages.subscription.formAdd')
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="editableTable" class="display table table-striped table-bordered"
                                        cellspacing="0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prix</th>
                                                <th>Durée</th>
                                                <th>Description</th>
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

        @include('backoffice.pages.subscription.deleteModal')

        <!-- Offcanvas d'édition -->
        @include('backoffice.pages.subscription.formUpdate')
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
            const FETCHDATAURL = "{{ route('backoffice.subscription.fetch_all') }}"
        </script>

        <script src="{{ asset('assets/backoffice/js/pages/subscription/index.js') }}"></script>
    @endsection
