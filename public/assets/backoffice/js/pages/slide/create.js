$(function () {
    // Reset du formulaire
    resetFormAdd()


    // Validation client du formulaire d'ajout
    $("#addSlideForm").validate({
        rules: {
            image: {
                required: true
            },
            header: {
                maxlength: 255
            }
        },
        messages: {
            image: {
                required: 'Veuillez uploader une image.'
            },
            header: {
                maxlength: 'Le titre ne doit pas dépasser 255 caractères.'
            }
        },
        // Ajouter dynamiquement une nouvelle ligne
        submitHandler: function (form) {
            $(form).find('div.alert').addClass('d-none')

            const formData = new FormData(form)

            $.ajax({
                url: $(form).attr('action'),  // Endpoint pour ajouter les données
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    showNotif('success', '<strong>Success</strong>', 'fas fa-images', response.message)
                    // Reset du form d'ajout
                    resetFormAdd()
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
})



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

function resetFormAdd() {
    $('#addSlideForm div.alert').addClass('d-none')
    $('#addSlideForm').trigger('reset')
}