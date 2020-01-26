$(document).ready(function() {
   $('#addDiv').hide();
   $('#viewDiv').hide();

   $('#addNewGame').on('click', function() {
        $('#selectDiv').replaceWith($('#addDiv').show());
    });


    $('#viewGames').on('click', function() {
        $('#selectDiv').replaceWith($('#viewDiv').show());
   });

});

function getMyGames() {
    const apiUrl = "http://localhost/PAI";
    const $list = $('.games-list');

    $.ajax({
        url : apiUrl + '/?page=loadmygames',
        dataType : 'json'
    })
    .done((res) => {
        $list.empty();

        res.forEach(el => {
            $list.append(`<tr>
                        <td><img src='Public/img/uploads/game/${el.gameimg}' class='game-pic'></td>
                        <td>${el.name}</td>
                        <td>${el.playersMin} - ${el.playersMax}</td>
                        <td id="description">${el.description}</td>
                        <td><button class="btn btn-danger" type="button" onclick="deleteGame('${el.id_game}')"><i class="fas fa-ban"></i></a></td></button>
                        </tr>`);
        });
    });
}

function deleteGame(id_game) {
        if (!confirm('Do you want to delete this game?')) {
            return;
        }
        const apiUrl = "http://localhost/PAI";
        $.ajax({
            url : apiUrl + '/?page=deleteGame',
            method : 'POST',
            data : {
                id_game : id_game
            },
            success: function() {
                alert('Game has been deleted!');
                getMyGames();
            }
        })
}





