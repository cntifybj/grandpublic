//#region Configuration générale

const CURRENTURL = window.location.href

let slide_card = null


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



//#region Form d'édition

// Pré-remplir les champs
$('button[data-bs-target="#editSlide"]').on('click', function () {

    $('#editSlideForm').trigger('reset')
    $('#editSlideForm div.alert').addClass('d-none')

    slide_card = $(this).parents('div.card')
    const infos = $(this).siblings('.text-info')

    const visible = $(infos).find('.visibility-status').hasClass('text-bg-success')

    const header = $(this).siblings('.card-title').text().trim()
    const text = $(this).siblings('.card-text').text().trim()


    $('#editSlideForm input[name="visible"]').each(function (index, element) {
        if (visible) {
            if ($(element).val() === "0") $(element).prop('checked', false)
            else if ($(element).val() === "1") $(element).prop('checked', true)
        } else {
            if ($(element).val() === "0") $(element).prop('checked', true)
            else if ($(element).val() === "1") $(element).prop('checked', false)
        }
    })

    $('#editSlideForm').find('input[name="header"]').val(header)
    $('#editSlideForm').find('textarea[name="text"]').val(text)
})

// Validation client du formulaire d'édition
$("#editSlideForm").validate({
    rules: {
        header: {
            maxlength: 255
        }
    },
    messages: {
        header: {
            maxlength: 'Le titre ne doit pas dépasser 255 caractères.'
        }
    },
    // Ajouter dynamiquement une nouvelle ligne
    submitHandler: function (form) {
        $(form).find('div.alert').addClass('d-none')

        const formData = new FormData(form)


        $.ajax({
            url: CURRENTURL + `/${$(slide_card).attr('slide-id')}`,  // Endpoint pour modifier l'instance choisie
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                const new_slide = JSON.parse(response?.slide)

                $(slide_card).find('img').attr('src', new_slide?.image)
                $(slide_card).find('.card-title').text(new_slide?.header)
                $(slide_card).find('.card-text').text(new_slide?.text)
                $(slide_card).find('.slide-position').text(new_slide?.position)
                $(slide_card).find('.visibility-status').replaceWith(`
                    <span class="ms-2 badge rounded-pill visibility-status ${new_slide?.visible ? 'text-bg-success' : 'text-bg-warning'}">
                    ${new_slide?.visible ? 'Visible' : 'Masqué'}
                    </span>`)


                $("#editSlide .btn-close").trigger('click')
                showNotif('success', '<strong>Success</strong>', 'fas fa-images', response.message)
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