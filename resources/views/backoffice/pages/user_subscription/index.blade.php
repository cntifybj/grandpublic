@extends('backoffice.layouts.main')

@section('page_styles')
    <!-- Bootstrap DataTable -->
    <link rel="stylesheet" href="{{ asset('assets/backoffice/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('page_content')
    <div class="container mt-4">
        <div class="table-responsive">
            <table id="editableTable" class="display table table-striped table-bordered" cellspacing="0" style="width:100%">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Montant Payé (XOF)</th>
                        <th>Début Abonnement</th>
                        <th>Fin Abonnement</th>
                        <th>Durée Abonnement</th>
                        <th>Status Abonnement</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    @endsection

    @section('page_scripts')
        <!-- DataTable -->
        <script src="{{ asset('assets/backoffice/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/backoffice/js/plugin/datatables/dataTables.bootstrap5.min.js') }}"></script>

        <script>
            const FETCHDATAURL = "{{ route('backoffice.user_subscription.fetch_all') }}"
        </script>

        <script src="{{ asset('assets/backoffice/js/pages/user_subscription/index.js') }}"></script>
    @endsection
