/* 
 * admin
 * @version 0.1
 * @author Daniel Huidobro <daniel.hui287@gmail.com>
 * Script de la vista admin
 */

$(document).ready(function () {
    $('.delete-place').click(function () {
        if (confirm('¿Estas seguro que deseas eliminar este lugar?')) {
            var id_place = $(this).attr('id-place');
            $.post('/places/delete', {'id_place': id_place}, function (rest) {
                if (rest.status) {
                    $('.row-' + id_place).remove();
                    var message = $('<p class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> ' + rest.message + '</p>');
                } else {
                    var message = $('<p class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> ' + rest.message + '</p>');
                }
                $("#messenger").prepend(message);
                setTimeout(function () {
                    message.remove();
                }, 3000);
                console.debug(rest);
            }, 'json');
        }
    });
});
