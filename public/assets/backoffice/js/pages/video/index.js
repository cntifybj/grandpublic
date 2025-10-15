//#region Configuration générale

const CURRENTURL = window.location.href
let rowData = {}
let table = null



$.validator.addMethod("isYoutubeURL", function (value, element) {
    return this.optional(element) || /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/.test(value)
}, "Le lien que vous avez soumis n'est pas conforme aux standard Youtube. Veuillez vérifier l'url.")


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

function formatDate(dateString) {
    const date = new Date(dateString)

    // Options pour formater la date en français
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    }

    // Formater la date
    return date.toLocaleDateString('fr-FR', options)
}


$(function () {

    $('input[name="set_publication_date"]').on('change', function () {
        if ($(this).val() === 'automatic' && $(this).prop('checked')) {
            $(this).closest('.custom-form-input').find('[name="publication_date"]').val('').addClass('d-none')
        } else if ($(this).val() === 'manual' && $(this).prop('checked')) {
            $(this).closest('.custom-form-input').find('[name="publication_date"]').removeClass('d-none')
        }
    })


    $('input[name="premium_video"]').on('change', function () {
        let container = $(this).closest('.offcanvas-body')
        let toMask = $(container).find('.dependPremiumValue')

        if ($(this).val() == false && $(this).prop('checked')) {
            $(toMask).addClass('d-none').find('input').val('')

        } else if ($(this).val() == true && $(this).prop('checked')) {
            $(toMask).removeClass('d-none')
        }
    })

})


//#endregion



//#region Initialisation du DataTable

async function initializeDataTable() {
    try {
        table = $('#editableTable').DataTable({
            ajax: FETCHDATAURL,  // Endpoint pour récupérer les données
            columns: [
                { data: 'youtube_id', visible: false },
                { data: 'video_thumbnail', visible: false },
                {
                    data: 'title',
                    render: function (data, type, full, meta) {
                        return typeof (data) == 'string'
                            ? (data.length > 40
                                ? data.slice(0, 40) + '...'
                                : data
                            )
                            : 'N/A'
                    }
                },
                { data: 'video_creator_name' },
                {
                    data: 'description',
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
                    data: 'category',
                    render: function (data, type, full, meta) {
                        return data ? data.toUpperCase()
                            : 'N/A'
                    }
                },
                {
                    data: 'premium_video',
                    render: function (data, type, full, meta) {
                        return data == '1' ? '<span class="badge badge-success"><i class="fas fa-check"></i></span>'
                            : '<span class="badge badge-danger"><i class="fas fa-times"></i></span>'
                    }
                },
                {
                    data: 'highlighted',
                    render: function (data, type, full, meta) {
                        return data == '1' ? '<span class="badge badge-success"><i class="fas fa-check"></i></span>'
                            : '<span class="badge badge-danger"><i class="fas fa-times"></i></span>'
                    }
                },
                { data: 'single_price', visible: false },
                { data: 'date_time_to_offer_free_access', visible: false },
                { data: 'video_preview', visible: false },
                {
                    data: 'publication_date',
                    render: function (data, type, full, meta) {
                        return formatDate(data)
                    }
                },
                {
                    data: null,
                    render: function (data, type, full, meta) {
                        return `
                            <div class="d-flex justify-content-between">
                            <button class="edit-btn btn btn-sm btn-warning" title="Modifier"
                                data-bs-toggle="offcanvas" data-bs-target="#editVideo" aria-controls="editVideo">
                                <i class="fas fa-edit"></i>
                            </button> 
                            <button class="delete-btn btn btn-sm btn-danger" type="button"
                             data-bs-toggle="modal" data-bs-target="#deleteModal"
                             title="Supprimer">
                                <i class="far fa-trash-alt"></i>
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

    } catch {
        $('#editableTable tbody').html(`
            <tr>
                <td colspan="11">
                    <div class="text-black">Erreur lors de l'initialisation du tableau : ${error}</div>
                </td>
            </tr>
            `
        )
    }
}
initializeDataTable()
//#endregion


//#region Form d'édition

$('.table-responsive').on('click', '.edit-btn, .delete-btn', function () {
    // Récupérer la ligne à laquelle le bouton appartient
    rowData = table.row($(this).parents('tr')).data()
})

// Pré-remplir les champs
$('.table-responsive').on('click', '.edit-btn', function () {

    $('#editVideoForm').trigger('reset')
    $('#editVideoForm div.alert').addClass('d-none')


    $('#editVideoForm input[name="highlighted"]').each(function (index, element) {
        if (rowData.highlighted) {
            if ($(element).val() === "0") $(element).prop('checked', false)
            else if ($(element).val() === "1") $(element).prop('checked', true)
        } else {
            if ($(element).val() === "0") $(element).prop('checked', true)
            else if ($(element).val() === "1") $(element).prop('checked', false)
        }
    })

    $('#editVideoForm input[name="set_publication_date"]').each(function (index, element) {
        if (rowData.publication_date) {
            if ($(element).val() === "automatic") $(element).prop('checked', false)
            else if ($(element).val() === "manual") $(element).prop('checked', true)
        } else {
            if ($(element).val() === "automatic") $(element).prop('checked', true)
            else if ($(element).val() === "manual") $(element).prop('checked', false)
        }
    })

    $('#editVideoForm input[name="premium_video"]').each(function (index, element) {
        if (rowData.premium_video) {
            if ($(element).val() === "0") $(element).prop('checked', false)
            else if ($(element).val() === "1") $(element).prop('checked', true)
        } else {
            if ($(element).val() === "0") $(element).prop('checked', true)
            else if ($(element).val() === "1") $(element).prop('checked', false)
        }
    })

    $('#editVideoForm').find('input[name="youtube_id"]').val(`https://youtube.com/watch?v=${rowData.youtube_id}`)
    // Affiche l'image de prévisualisation
    $('#videoThumbnailPreview').attr('src', rowData.video_thumbnail)

    $('#editVideoForm').find('input[name="title"]').val(rowData.title)
    $('#editVideoForm').find('input[name="video_creator_name"]').val(rowData.video_creator_name)
    $('#categoryEdit').val(rowData.category)
    $('#categoryEdit').val('opinion') 
    $('#editVideoForm').find('textarea[name="description"]').val(rowData.description)
    $('#editVideoForm').find('input[name="single_price"]').val(rowData.single_price)
    $('#editVideoForm').find('input[name="date_time_to_offer_free_access"]').val(rowData.date_time_to_offer_free_access)
    $('#editVideoForm').find('input[name="publication_date"]').val(rowData.publication_date)

    $('#editVideoForm input[name="set_publication_date"]').trigger('change')
    $('#editVideoForm input[name="premium_video"]').trigger('change')
})

// Validation client du formulaire d'édition
$("#editVideoForm").validate({
    rules: {
        youtube_id: {
            required: true,
            isYoutubeURL: true
        },
        title: {
            required: true,
            maxlength: 255
        },
        premium_video: {
            required: true
        },
        highlighted: {
            required: true
        },
        single_price: {
            digits: true
        },
        date_time_to_offer_free_access: {
            date: true
        },
        publication_date: {
            date: true
        }
    },
    messages: {
        youtube_id: {
            required: 'Veuillez soumettre une url Youtube.'
        },
        title: {
            required: 'Veuillez soumettre un titre pour cette vidéo Youtube.',
            maxlength: 'Le titre ne doit pas dépasser 255 caractères.'
        },
        premium_video: {
            required: 'Veuillez sélectionner le type de vidéo.'
        },
        highlighted: {
            required: 'Veuillez choisir si la vidéo sera mise en avant ou non.'
        },
        single_price: {
            digits: 'Veuillez entrer un prix valide.'
        },
        date_time_to_offer_free_access: {
            date: 'Veuillez entrer une date de libre accès valide.'
        },
        publication_date: {
            date: 'Veuillez entrer une date de publication valide.'
        }
    },
    // Ajouter dynamiquement une nouvelle ligne
    submitHandler: function (form) {
        $(form).find('div.alert').addClass('d-none')

        const formData = new FormData(form)

        $.ajax({
            url: CURRENTURL + `/${rowData.id}`,  // Endpoint pour modifier l'instance choisie
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#editVideo .btn-close").trigger('click')
                table.ajax.reload()  // Recharger le DataTable
                showNotif('success', '<strong>Success</strong>', 'fab fa-youtube', response.message)
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


//#region Suppresion d'une vidéo
$('#confirmDeleteBtn').click(function () {
    $.ajax({
        url: CURRENTURL + `/${rowData.id}`, // L'URL de l'API pour supprimer la vidéo
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        type: 'DELETE',
        success: function (response) {
            // En cas de succès, fermer le modal et afficher un message de succès
            $('#deleteModal').modal('hide');
            table.ajax.reload()  // Recharger le DataTable
            showNotif('success', '<strong>Suppression</strong>', 'fab fa-youtube', response.message)
        },
        error: function (xhr, status, error) {
            // En cas d'erreur, afficher un message d'erreur
            alert('Erreur lors de la suppression de la vidéo. Veuillez réessayer.');
        }
    });
});
//#endregion