//#region Configuration générale

const CURRENTURL = window.location.href
let rowData = {}
let rowLine = 1

// fonction générique pour gérer les notifications
function showNotif(type = 'success', title = '<strong>Success!</strong>', icon = 'fa fa-bell', message = 'Your password has been successfully changed.') {

    $.notify({
        title,
        icon,
        message
    }, {
        type,
        allow_dismiss: true,
        delay: 3000,
        placement: {
            from: "top",
            align: "left"
        },
        animate: {
            enter: 'animated fadeInLeft',
            exit: 'animated fadeOutLeft'
        }
    })

}

//#endregion


//#region Initialisation du DataTable

// Initialisation du DataTable
let table = $('#editableTable').DataTable({
    ajax: FETCHDATAURL,  // Endpoint pour récupérer les données
    columns: [
        {
            data: null,
            render: function (data, type, full, meta) {
                return rowLine++
            }
        },
        { data: 'title' },
        {
            data: 'short_description',
            render: function (data, type, full, meta) {
                return typeof (data) == 'string'
                    ? (data.length > 40
                        ? data.slice(0, 40) + '...'
                        : data
                    )
                    : 'N/A'
            }
        },
        {
            data: 'posted',
            render: function (data, type, full, meta) {
                return data == '1' ?
                    '<span class="badge badge-success">Postée</span>' :
                    '<span class="badge badge-warning">Non Postée</span>';
            }
        },
        {
            data: null,
            render: function (data, type, full, meta) {
                return `
                <div class="d-flex justify-content-between">
                    <button class="more-btn btn btn-sm btn-info" title="Voir plus">
                        <i class="far fa-file-alt"></i>
                    </button>
                    ${!full['posted'] ?
                        `<button class="change-posted-status-btn btn btn-sm btn-secondary me-2" data-id="${full['id']}" title="Publier la notification">
                        <i class="fas fa-paper-plane"></i>
                    </button>`
                        : ''}
                    <button class="edit-btn btn btn-sm btn-warning" title="Modifier"
                        data-bs-toggle="offcanvas" data-bs-target="#editNotification" aria-controls="editNotification">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#deleteNotification"
                      class="delete-btn btn btn-sm btn-danger" title="Supprimer">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                <div>
                `
            }
        }
    ],
    language: {
        "url": "https://cdn.datatables.net/plug-ins/2.1.8/i18n/fr-FR.json"  // Traduction en français
    }
})
//#endregion



//#region Form d'ajout

// Validation client du formulaire d'ajout
$("#addNotificationForm").validate({
    rules: {
        title: {
            required: true
        },
        short_description: {
            required: true
        },
    },
    messages: {
        title: {
            required: 'Veuillez renseigner un titre pour cette notification.'
        },
        short_description: {
            required: 'Veuillez renseigner une description pour cette notification.'
        },
    },
    // Ajouter dynamiquement une nouvelle ligne
    submitHandler: function (form) {
        $(form).find('div.alert').addClass('d-none')

        const formData = new FormData(form)
        let datas = {}

        // Display the key/value pairs
        for (const pair of formData.entries()) {
            datas[pair[0]] = pair[1]
        }

        $.ajax({
            url: $(form).attr('action'),  // Endpoint pour ajouter les données
            type: 'POST',
            data: datas,
            success: function (response) {
                $(form).trigger('reset').find('div.alert-danger').addClass('d-none')
                table.ajax.reload()  // Recharger le DataTable
                showNotif('success', '<strong>Success</strong>', 'fas fa-check-circle', response.message)
            },
            error: function (response) {
                for (const [key, value] of Object.entries(response.responseJSON['errors'])) {
                    $(`div[error-input="${key}"]`).html(value.join('<br>')).removeClass('d-none')
                }
            }
        })
    },
    // Quand il y a une/plusieurs erreur(s)
    highlight: function (element) {
        $(element).closest('.custom-form-input').find('div.alert').removeClass('d-none')
    },
    // Quand il n'y a aucune erreur
    unhighlight: function (element) {
        $(element).closest('.custom-form-input').find('div.alert').addClass('d-none')
    },
    errorPlacement: function (error, element) {
        $(element).closest('.custom-form-input').find('div.alert').text(error.text())
    }
})
//#endregion



//#region Form d'édition

// Ceci sert à suivre les mouvements utilisateurs sur la liste
$('.table-responsive').on('click', '.more-btn, .edit-btn, .delete-btn', function () {
    // Récupérer la ligne à laquelle le bouton appartient
    rowData = table.row($(this).parents('tr')).data()
})

// Pré-remplir les champs
$('.table-responsive').on('click', '.edit-btn', function () {

    $('#editNotificationForm').trigger('reset')
    $('#editNotificationForm div.alert').addClass('d-none')

    $("#editNotificationForm").find('input[name="title"]').val(rowData.title)
    $("#editNotificationForm").find('textarea[name="short_description"]').val(rowData.short_description)
})

// Validation client du formulaire d'édition
$("#editNotificationForm").validate({
    rules: {
        title: {
            required: true
        },
        short_description: {
            required: true
        },
    },
    messages: {
        title: {
            required: 'Veuillez renseigner un titre pour cette notification.'
        },
        short_description: {
            required: 'Veuillez renseigner une description pour cette notification.'
        },
    },
    // Ajouter dynamiquement une nouvelle ligne
    submitHandler: function (form) {
        $(form).find('div.alert').addClass('d-none')

        const formData = new FormData(form)
        let datas = {}

        // Display the key/value pairs
        for (const pair of formData.entries()) {
            datas[pair[0]] = pair[1]
        }

        $.ajax({
            url: CURRENTURL + `/${rowData.id}`,  // Endpoint pour modifier l'instance choisie
            type: 'POST',
            data: datas,
            success: function (response) {
                $("#editNotification .btn-close").trigger('click')
                table.ajax.reload()  // Recharger le DataTable
                showNotif('success', '<strong>Success</strong>', 'fas fa-check-circle', response.message)
            },
            error: function (response) {
                for (const [key, value] of Object.entries(response.responseJSON['errors'])) {
                    $(`div[error-input="${key}"]`).html(value.join('<br>')).removeClass('d-none')
                }
            }
        })
    },
    // Quand il y a une/plusieurs erreur(s)
    highlight: function (element) {
        $(element).closest('.custom-form-input').find('div.alert').removeClass('d-none')
    },
    // Quand il n'y a aucune erreur
    unhighlight: function (element) {
        $(element).closest('.custom-form-input').find('div.alert').addClass('d-none')
    },
    errorPlacement: function (error, element) {
        $(element).closest('.custom-form-input').find('div.alert').text(error.text())
    }
})

//#endregion



//#region Suppression d'une ressource

$('#confirmDeletion').on('click', function () {
    $.ajax({
        type: "DELETE",
        url: CURRENTURL + `/${rowData.id}`,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            table.ajax.reload()  // Recharger le DataTable
            $('.btn-close').trigger('click')
            showNotif('success', '<strong>Success</strong>', 'fas fa-check-circle', response.message)
        },
        error: function (response) {
            showNotif('danger', '<strong>Error</strong>', 'fas fa-times', response?.responseJSON?.message)
        }
    });
});

//#endregion


// Suivi du clic pour 'change-posted-status-btn'
$('.table-responsive').on('click', '.change-posted-status-btn', function () {
    // Récupérer la ligne à laquelle le bouton appartient
    const row = table.row($(this).parents('tr')); // Toujours définir 'row' ici
    rowData = row.data(); // Et récupérer les données correspondantes

    $.ajax({
        url: POST_NOTIF_ROUTE,
        method: 'POST',
        data: {
            id: $(this).data('id'),
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            rowData.posted = 1; // Mettre à jour les données dans le tableau

            // Mettre à jour la colonne "posted"
            row.invalidate().draw(); // Réactualiser la ligne (sans recharger toute la table)
        },
        error: function () {
            // Si une erreur se produit, restaurer l'état précédent dans la table
            rowData.posted = 0;
            row.invalidate().draw();
            alert('Erreur lors de la mise à jour du statut');
        }
    });
});
