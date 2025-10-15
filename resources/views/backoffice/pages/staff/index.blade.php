@extends('backoffice.layouts.main')

@section('page_styles')
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('page_content')
    <div class="container mt-4">
        <button class="btn btn-primary mb-3" data-bs-toggle="offcanvas" data-bs-target="#addStaffMember"
            aria-controls="addStaffMember">Add a member&ensp;<i class="fa fa-plus"></i></button>
        <div class="table-responsive">
            <table id="editableTable" class="display table table-striped table-bordered" cellspacing="0" style="width:100%">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Status du compte</th>
                        <th>Membre depuis</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Offcanvas d'ajout-->
        @include('backoffice.pages.staff.formAdd')

        <!-- Offcanvas d'édition -->
        @include('backoffice.pages.staff.formUpdate')
    </div>
    @endsection

    @section('page_scripts')
        <script src="{{ asset('assets/backoffice/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/backoffice/js/plugin/datatables/dataTables.bootstrap5.min.js') }}"></script>

        <!-- Bootstrap Notify -->
        <script src="{{ asset('assets/backoffice/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>


        <!-- JQuery Validate Plugin -->
        <script src="{{ asset('assets/backoffice/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

        <script>
            const FETCHDATAURL = "{{ route('backoffice.staff.fetch_all') }}"
        </script>

        <script src="{{ asset('assets/backoffice/js/pages/staff/index.js') }}"></script>
    @endsection
