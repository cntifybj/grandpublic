//#region Configuration générale

const CURRENTURL = window.location.href
let rowData = {}

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
        { data: 'short_identifier' },
        { data: 'name' },
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
            data: null,
            render: function (data, type, full, meta) {
                return `
                <div class="d-flex justify-content-between">
                    <button class="more-btn btn btn-sm btn-info" title="Voir plus">
                        <i class="far fa-file-alt"></i>
                    </button>
                    <button class="edit-btn btn btn-sm btn-warning" title="Modifier"
                        data-bs-toggle="offcanvas" data-bs-target="#editCenterOfInterest" aria-controls="editCenterOfInterest">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#deleteCenterOfInterest"
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
$("#addCenterOfInterestForm").validate({
    rules: {
        name: {
            required: true
        },
    },
    messages: {
        name: {
            required: 'Veuillez renseigner un nom pour ce centre d\'intérêt.'
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

    $('#editCenterOfInterestForm').trigger('reset')
    $('#editCenterOfInterestForm div.alert').addClass('d-none')

    $("#editCenterOfInterestForm").find('input[name="name"]').val(rowData.name)
    $("#editCenterOfInterestForm").find('textarea[name="short_description"]').val(rowData.short_description)
})

// Validation client du formulaire d'édition
$("#editCenterOfInterestForm").validate({
    rules: {
        name: {
            required: true
        },
    },
    messages: {
        name: {
            required: 'Veuillez renseigner un nom pour ce centre d\'intérêt.'
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
                $("#editCenterOfInterest .btn-close").trigger('click')
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
            showNotif('danger', '<strong>Error</strong>', 'fas fa-check-circle', response?.responseJSON?.message)
        }
    });
});

//#endregion
