
//#region Initialisation du DataTable

// Initialisation du DataTable
let table = $('#editableTable').DataTable({
    ajax: FETCHDATAURL,  // Endpoint pour récupérer les données
    columns: [
        {
            data: 'user_id',
            render: function (data, type, full, meta) {
                return full['user_name']
                    ? `${full['user_name']}`
                    : 'N/A'
            }
        },
        { data: 'amount_paid' },
        { data: 'start_date' },
        { data: 'end_date' },
        { data: 'duration' },
        {
            data: 'expired',
            render: function (data, type, full, meta) {
                return data == '1' ? '<span class="badge badge-warning">Expiré</span>'
                    : '<span class="badge badge-success">Actif</span>'
            }
        }/* ,
        {
            data: null,
            render: function (data, type, full, meta) {
                return `
                <div class="d-flex justify-content-between">
                    <button class="more-btn btn btn-sm btn-info" title="Voir plus">
                        <i class="far fa-file-alt"></i>
                    </button>
                <div>
                `
            }
        } */
    ],
    language: {
        "url": "https://cdn.datatables.net/plug-ins/2.1.8/i18n/fr-FR.json"  // Traduction en français
    }
})
//#endregion
