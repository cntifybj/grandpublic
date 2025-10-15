$(function () {

    $('input[name="set_publication_date"]').on('change', function () {
        if ($(this).val() === 'automatic' && $(this).prop('checked')) {
            $(this).closest('.custom-form-input').find('[name="publication_date"]').val('').addClass('d-none')
        } else if ($(this).val() === 'manual' && $(this).prop('checked')) {
            $(this).closest('.custom-form-input').find('[name="publication_date"]').removeClass('d-none')
        }
    })


    $('input[name="premium_video"]').on('change', function () {
        let toMask = $('.dependPremiumValue')

        if ($(this).val() == false && $(this).prop('checked')) {
            $(toMask).addClass('d-none').find('input').val('')

        } else if ($(this).val() == true && $(this).prop('checked')) {
            $(toMask).removeClass('d-none')
        }
    })

    $('input[name="youtube_id"]').on('focusout', function () {

        const videoId = extractYouTubeID($(this).val())

        if (videoId) {
            // URL de la miniature YouTube (format standard)
            const thumbnailUrl = `https://img.youtube.com/vi/${videoId}/mqdefault.jpg`

            // Affiche l'image de prévisualisation
            $('#videoThumbnailPreview').attr('src', thumbnailUrl)
            $('#videoThumbnailPreviewContainer').removeClass('d-none')
        } else {
            // Masque l'aperçu si l'URL n'est pas valide
            $('#videoThumbnailPreviewContainer').addClass('d-none')
        }

    })

    // Reset du formulaire
    resetFormAdd()


    // Validation client du formulaire d'ajout
    $("#addVideoForm").validate({
        rules: {
            youtube_id: {
                required: true,
                isYoutubeURL: true
            },
            title: {
                required: true,
                maxlength: 255
            },
            category_id: {
                required: true
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
            category_id: {
                required: 'Veuillez sélectionner une catégorie vidéo.'
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
                url: $(form).attr('action'),  // Endpoint pour ajouter les données
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    showNotif('success', '<strong>Success</strong>', 'fab fa-youtube', response.message)
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
    $('#addVideoForm div.alert').addClass('d-none')
    $('#addVideoForm').trigger('reset')
}

$.validator.addMethod("isYoutubeURL", function (value, element) {
    return this.optional(element) || /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/.test(value)
}, "Le lien que vous avez soumis n'est pas conforme aux standard Youtube. Veuillez vérifier l'url.")


function extractYouTubeID(url) {
    // Expression régulière pour capturer l'ID de la vidéo dans différents types de liens YouTube
    const pattern = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/

    const matches = url.match(pattern)
    return matches ? matches[1] : false
}