$(document).ready(function() {
   $('#resultDiv').hide();

   $('#searchDiv').on('click', function() {
        $('#formDiv').replaceWith($('#resultDiv').show());
    });

});

function  {
    const apiUrl = "http://localhost/PAI";
    const $list = $('.result-list');

    $.ajax({
        url : apiUrl + '/?page=searchGames',
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
                        </tr>`);
        });
    });
}
