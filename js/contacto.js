$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // Mensajes de error
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();

            // get values from FORM
            var name = $("input#nombre").val();
            var email = $("input#email").val();
            var phone = $("input#telefono").val();
            var message = $("textarea#mensaje").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "../enviamail.php",
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#exito').html("<div class='alert alert-success'>");
                    $('#exito > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#exito > .alert-success')
                        .append("<strong>Su mensaje ha sido enviado. </strong>");
                    $('#exito > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#formularioContacto').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#exito').html("<div class='alert alert-danger'>");
                    $('#exito > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#exito > .alert-danger').append("<strong>Lo sentimos " + firstName + ", parece que nuestro servidor de mail no está respondiendo. Intente mas tarde.");
                    $('#exito > .alert-danger').append('</div>');
                    //clear all fields
                    $('#formularioContacto').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#nombre').focus(function() {
    $('#exito').html('');
});
