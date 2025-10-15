//#region Configuration générale

const CURRENTURL = window.location.href
let currentStaffMember = ""

// Toggle du password
$('.togglePassword').on('click', function () {
    const passwordInput = $(this).parent().find('input[name="password"]')
    const type = passwordInput.attr('type') === 'password' ? 'text' : 'password'
    passwordInput.attr('type', type)

    // Changer l'icône œil ouvert/fermé
    $(this).find('i').toggleClass('fa-eye fa-eye-slash')
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

function formatDate(dateString) {
    const date = new Date(dateString);

    // Options pour formater la date en français
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    };

    // Formater la date
    return date.toLocaleDateString('fr-FR', options);
}

//#endregion


//#region Initialisation du DataTable

// Initialisation du DataTable
let table = $('#editableTable').DataTable({
    ajax: FETCHDATAURL,  // Endpoint pour récupérer les données
    columns: [
        { data: 'name' },
        {
            data: 'email',
            render: function (data, type, full, meta) {
                return `<span>${data}</span>` + `<span class="d-none">${full['password']}</span>`
            }
        },
        {
            data: 'role',
            render: function (data, type, full, meta) {
                return data ? $('#roleCreate').find(`option[value="${data}"]`).text() + `<span class="d-none">${data}</span>`
                    : data.toUpperCase()
            }
        },
        {
            data: 'suspended',
            render: function (data, type, full, meta) {
                return data == '1' ? '<span class="badge badge-warning">Suspendu</span>'
                    : '<span class="badge badge-success">Actif</span>'
            }
        },
        {
            data: 'first_login',
            render: function (data, type, full, meta) {
                return data ? formatDate(data)
                    : 'N/A'
            }
        },
        {
            data: null,
            render: function (data, type, full, meta) {
                return `
            <div class="d-flex justify-content-between">
                <button class="more-btn btn btn-sm btn-info" title="Voir plus" staff_member_id="${full['id']}">
                    <i class="far fa-file-alt"></i>
                </button>
                <button class="edit-btn btn btn-sm btn-warning" title="Modifier" staff_member_id="${full['id']}"
                    data-bs-toggle="offcanvas" data-bs-target="#editStaffMember" aria-controls="editStaffMember">
                        <i class="fas fa-edit"></i>
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

// Reset du form d'ajout
$('button[data-bs-target="#addStaffMember"]').on('click', function () {
    $('#addStaffMemberForm').trigger('reset')
    $('#addStaffMemberForm div.alert').addClass('d-none')
})

// Validation client du formulaire d'ajout
$("#addStaffMemberForm").validate({
    rules: {
        name: {
            minlength: 5
        },
        role: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
            minlength: 8,
            maxlength: 40
        }
    },
    messages: {
        name: {
            minlength: "Le nom d'utilisateur doit comporter au moins 5 caractères."
        },
        role: {
            required: "Veuillez sélectionner un rôle."
        },
        email: {
            required: "L'email est obligatoire.",
            email: "Veuillez entrer un email valide."
        },
        password: {
            required: "Le mot de passe est obligatoire.",
            minlength: "Le mot de passe doit comporter au moins 8 caractères.",
            maxlength: "Le mot de passe ne doit pas comporter plus de 40 caractères."
        }
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
                $("#addStaffMember .btn-close").trigger('click')
                table.ajax.reload()  // Recharger le DataTable
                showNotif('success', '<strong>Success</strong>', 'fas fa-user-plus', response.message)
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
$('.table-responsive').on('click', '.edit-btn, .toggle_status-btn', function () {
    currentStaffMember = parseInt($(this).attr('staff_member_id'))
})

// Pré-remplir les champs
$('.table-responsive').on('click', '.edit-btn', function () {

    $('#editStaffMemberForm').trigger('reset')
    $('#editStaffMemberForm div.alert').addClass('d-none')

    const row = $(this).closest('tr')

    let name = row.find('td:nth-child(1)').text()
    let password = row.find('td:nth-child(2) span:last-child').text()
    let role = row.find('td:nth-child(3) span:last-child').text()
    let suspended = row.find('td:nth-child(5) span[class*="warning"]').length > 0


    $("#editStaffMemberForm").find('input[name="name"]').val(name)
    $("#editStaffMemberForm").find('input[name="password"]').val(password)

    $("#editStaffMemberForm").find('input[name="suspended"]').prop('checked', suspended)
    $('#roleEdit').val(role)
})

// Validation client du formulaire d'édition
$("#editStaffMemberForm").validate({
    rules: {
        name: {
            minlength: 5
        },
        role: {
            required: true
        },
        password: {
            required: true,
            minlength: 8,
            maxlength: 40
        }
    },
    messages: {
        name: {
            minlength: "Le nom d'utilisateur doit comporter au moins 5 caractères."
        },
        role: {
            required: "Veuillez sélectionner un rôle."
        },
        password: {
            required: "Le mot de passe est obligatoire.",
            minlength: "Le mot de passe doit comporter au moins 8 caractères.",
            maxlength: "Le mot de passe ne doit pas comporter plus de 40 caractères."
        }
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
            url: CURRENTURL + `/${currentStaffMember}`,  // Endpoint pour modifier l'instance choisie
            type: 'PATCH',
            data: datas,
            success: function (response) {
                $("#editStaffMember .btn-close").trigger('click')
                table.ajax.reload()  // Recharger le DataTable
                showNotif('success', '<strong>Success</strong>', 'fas fa-user-plus', response.message)
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