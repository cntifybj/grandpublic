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
                        <th>Nom</th>
                        <th>Nb de vidéos likés</th>
                        <th>Nb de commentaires</th>
                        <th>Nb de vidéos payés</th>
                        <th>Nb d'abonnements</th>
                        <th>Somme total dépensé (XOF)</th>
                        <th>Date d'inscription</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->liked_videos ?? 0 }}</td>
                            <td>{{ $user->comments_count ?? 0 }}</td>
                            <td>{{ $user->paid_videos ?? 0 }}</td>
                            <td>{{ $user->payments->whereNotNull('subscription_id')->count() }}</td>
                            <td>{{ number_format($user->total_spent ?? 0, 0, '.', ' ') }}</td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>
        </div>
    </div>
    @endsection

    @section('page_scripts')
        <!-- DataTable -->
        <script src="{{ asset('assets/backoffice/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/backoffice/js/plugin/datatables/dataTables.bootstrap5.min.js') }}"></script>

        <script>
            let table = $('#editableTable').DataTable()
        </script>
    @endsection
