$(function () {
    $(document).ready(function () {
        const CURRENTURL = window.location.href

        let visibles = document.getElementById('visibles')
        let hiddens = document.getElementById('hiddens')

        // Options pour Sortable.js
        let sortableOptions = {
            group: 'shared', // Permet de connecter les listes
            animation: 150,
            ghostClass: 'sortable-placeholder', // Classe pour le placeholder
            fallbackOnBody: true, // Permet le déplacement sur le body
            forceFallback: true, // Forcer le fallback quand la liste est vide

            // Met à jour le style des listes quand elles deviennent vides ou non
            onAdd: function (evt) {
                updateListStyle()
            },
            onRemove: function (evt) {
                updateListStyle()
            }
        }
        // Liste 1
        let sortable1 = new Sortable(visibles, sortableOptions)

        // Liste 2
        let sortable2 = new Sortable(hiddens, sortableOptions)

        // Soumission du formulaire
        $('#sortable-form').submit(function (e) {
            e.preventDefault()

            let visibleSlideListOrder = []
            let hiddenSlideListOrder = []


            $('#visibles .slide').each(function () {
                visibleSlideListOrder.push($(this).attr('slide-id'))
            })

            $('#hiddens .slide').each(function () {
                hiddenSlideListOrder.push($(this).attr('slide-id'))
            })

            // Affichage des résultats dans la console (ou envoi à l'API)
            console.log('Ordre de la Liste 1: ', visibleSlideListOrder)
            console.log('Ordre de la Liste 2: ', hiddenSlideListOrder)


            $.ajax({
                url: CURRENTURL,  // URL d'update de l'ordre
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    visibles: visibleSlideListOrder,
                    hiddens: hiddenSlideListOrder,
                },
                success: function (response) {
                    showNotif('success', '<strong>Success</strong>', 'fas fa-check-circle', response.message)
                },
                error: function (response) {
                    showNotif('danger', '<strong>Erreur</strong>', 'fas fa-times-circle', response.responseJSON.message)
                }
            })
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

    // Fonction pour mettre à jour le style quand la liste est vide ou non
    function updateListStyle() {
        if ($('#visibles').children().length === 0) {
            $('#visibles').addClass('empty-list')
        } else {
            $('#visibles').removeClass('empty-list')
        }

        if ($('#hiddens').children().length === 0) {
            $('#hiddens').addClass('empty-list')
        } else {
            $('#hiddens').removeClass('empty-list')
        }
    }

    // Appeler la fonction au démarrage
    updateListStyle()
})

