/**
 * Created by asier on 11/11/14.
 */

document.getElementById('login').addEventListener('submit', function(e){
    e.preventDefault();

    var label = $('#label');
    var div = $('#div-control');

    $.post("app.php", $(this).serialize())
        .done(function () {
            label.text('Sesión iniciada correctamente!');
            div.removeClass('has-error').addClass('has-success');
        })
        .fail(function () {
            label.text('Usuario o contraseña incorrectos');
            div.removeClass('has-success').addClass('has-error');
        })
        .always(function () {
            label.removeClass('hide');
        })
});