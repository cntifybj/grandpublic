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
                        <th>N°</th>
                        <th>Vidéo</th>
                        <th>Utilisateur</th>
                        <th>Contenu</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- Modal HTML -->
        <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="commentModalLabel">Modération du commentaire</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="parentCommentSection" class="mb-3">
                            <p id="parentAuthor" class="fw-bold"></p>
                            <p id="parentContent" class="ps-3 border-start"></p>
                        </div>
                        <div id="commentSection">
                            <p id="commentAuthor" class="fw-bold"></p>
                            <p id="commentContent"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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

    <script>
        const FETCHDATAURL = "{{ route('backoffice.comment.fetch_all') }}"

        //#region Initialisation du DataTable
        let rowData = {}

        // Initialisation du DataTable
        let table = $('#editableTable').DataTable({
            ajax: FETCHDATAURL, // Endpoint pour récupérer les données
            columns: [{
                    data: null,
                    render: function(data, type, full, meta) {
                        // Utilisation de l'index de la ligne fourni par 'meta'
                        return meta.row +
                        1; // 'meta.row' donne l'index de la ligne, donc on ajoute 1 pour commencer à 1
                    }
                },
                {
                    data: 'video_title'
                },
                {
                    data: 'user_name'
                },
                {
                    data: 'content',
                    render: function(data, type, full, meta) {
                        return typeof(data) === 'string' ?
                            (data.length > 200 ? data.slice(0, 200) + '...' : data) :
                            'N/A';
                    }
                },
                {
                    data: 'deleted',
                    render: function(data, type, full, meta) {
                        return data == '1' ?
                            '<span class="badge badge-warning">Supprimé</span>' :
                            '<span class="badge badge-success">Approuvé</span>';
                    }
                },
                {
                    data: null,
                    render: function(data, type, full, meta) {
                        return `
                            <div class="d-flex justify-content-between">
                                <button class="more-btn btn btn-sm btn-info me-2" title="Voir plus">
                                    <i class="far fa-file-alt"></i>
                                </button>
                                <button class="change-deleted-status-btn btn btn-sm ${full['deleted'] ? 'btn-success' : 'btn-danger'} me-2" data-id="${full['id']}" title="${full['deleted'] ? 'Restaurer' : 'Supprimer'}">
                                    <i class="fas ${full['deleted'] ? 'fa-history' : 'fa-times'}"></i>
                                </button>
                            </div>
                        `;
                    }
                }
            ],
            language: {
                "url": "https://cdn.datatables.net/plug-ins/2.1.8/i18n/fr-FR.json" // Traduction en français
            }
        });
        //#endregion

        // Suivi du clic pour 'change-deleted-status-btn'
        $('.table-responsive').on('click', '.change-deleted-status-btn', function() {
            // Récupérer la ligne à laquelle le bouton appartient
            const row = table.row($(this).parents('tr')); // Toujours définir 'row' ici
            rowData = row.data(); // Et récupérer les données correspondantes

            // Changer le statut 'deleted' et l'icône associée
            let newStatus = rowData.deleted === 1 ? 0 : 1; // Inverser le statut (supprimé <-> approuvé)

            $.ajax({
                url: `{{ route('backoffice.comment.change-deleted-status') }}`,
                method: 'POST',
                data: {
                    id: $(this).data('id'),
                    deleted: newStatus,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    rowData.deleted = newStatus; // Mettre à jour les données dans le tableau

                    // Mettre à jour la colonne "deleted"
                    row.invalidate().draw(); // Réactualiser la ligne (sans recharger toute la table)

                    // Changer le texte et l'icône du bouton
                    $(this).attr('title', newStatus === 1 ? 'Restaurer' : 'Supprimer').toggleClass('btn-danger btn-success');
                    $(this).find('i').toggleClass('fa-times fa-history'); // Alterner l'icône
                },
                error: function() {
                    // Si une erreur se produit, restaurer l'état précédent dans la table
                    rowData.deleted = rowData.deleted === 1 ? 0 : 1;
                    row.invalidate().draw();
                    alert('Erreur lors de la mise à jour du statut');
                }
            });
        });

        // Suivi du clic pour 'more-btn' (Voir plus)
        $('.table-responsive').on('click', '.more-btn', function() {
            const row = table.row($(this).parents('tr')); // Toujours définir 'row' ici aussi
            rowData = row.data(); // Et récupérer les données correspondantes

            // Remplir les informations du commentaire principal
            $('#commentAuthor').text(rowData.user_name);
            $('#commentContent').text(rowData.content);

            // Vérifier s'il y a un commentaire parent et remplir ses données
            if (rowData.parent) {
                $('#parentCommentSection').removeClass('d-none'); // Afficher la section du commentaire parent
                $('#parentAuthor').text(rowData.parent.user_id);
                $('#parentContent').text(rowData.parent.content);
            } else {
                $('#parentCommentSection').addClass('d-none'); // Cacher la section si pas de parent
            }

            // Afficher le modal
            const commentModal = new bootstrap.Modal($('#commentModal'));
            commentModal.show();
        });
    </script>
@endsection
