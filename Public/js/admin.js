function getAllUsers() {

    const apiUrl = "http://localhost/PAI";
    const $list = $('.users-list');

    $.ajax({
        url : apiUrl + '/?page=users',
        dataType : 'json'

    })
    .done((res) => {
        $list.empty();

        res.forEach(el => {
            $list.append(`<tr>
                         <td>${el.id_user}</td>
                         <td>${el.name}</td>
                         <td>${el.email}</td>
                         <td>${el.id_role}</td>
                         <td><button onclick="deleteUser('${el.id_user}')"><i class="fas fa-trash-alt"></i></button><button onclick="give_denyAdmin('${el.id_user}', '${el.id_role}')"><i class="fas fa-user-cog"></i></button></td>
                         </tr>`);

        });
    });
}

function deleteUser(id_user) {
        if (!confirm('Do you want to delete this user?')) {
            return;
        }
        const apiUrl = "http://localhost/PAI";
        $.ajax({
            url : apiUrl + '/?page=admin_delete_user',
            method : 'POST',
            data : {
                id_user : id_user
            },
            success: function() {
                alert('User has been deleted!');
                getAllUsers();
            }
        })
}

function give_denyAdmin(id_user, id_role) {

        mess1 = "";

        if (id_role == 1) {
            apiUrl = "http://localhost/PAI/?page=admin_give_admin";
            mess1 = "Do you want to give this user admin permission?";
        }

        if (id_role == 2) {
            apiUrl = "http://localhost/PAI/?page=admin_deny_admin";
            mess1 = "Do you want to deny this user admin permission?";
        }

        if (!confirm(mess1)) {
            return;
        }

        // const apiUrl = "http://localhost/PAI";
        $.ajax({
            url : apiUrl,
            method : 'POST',
            dataType: 'json',
            data : {
                id_user : id_user
            },
            success() {
                alert('Added Admin in permission to user');
            }
        })
        .done(
            () => {
                alert('Selected user successfully deleted from database!');
            }
        );
}
