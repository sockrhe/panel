$(document).ready(function(){
    $.validator.setDefaults({
        submitHandler: function () {
            var form = $('#cambiar-password').serialize();
            $.ajax({
                url: '?c=dashboard&a=CambiarPasswordU',
                type: 'POST',
                data: form
            }).done(function(data) {
                if (data == 1){
                    swal({
                      title: "Correcto",
                      text: "Se ha modificado la contraseña correctamente.",
                      icon: "success",
                      button: "Aceptar",
                    });
                    window.setTimeout(function(){location.replace('index.php')},4000);
                } else {
                  swal({
                    title: "Error",
                    text: "No ha sido modificada la contraseña.",
                    icon: "warning",
                    button: "Aceptar",
                  });
                }
            }).fail(function(data){
              swal({
                title: "Error",
                text: "Ocurrio un error inesperado.",
                icon: "warning",
                button: "Aceptar",
              });
            });
        }
      });
      $('#cambiar-password').validate({
        rules: {
          nueva_pass: {
            required: true,
            minlength: 5
          },
          con_pass: {
            equalTo : "#nueva_pass",
            minlength: 5
          }
        },
        messages: {
          nueva_pass: {
            required: "Please enter a new password",
            minlength: "Your password must be at least 5 characters long"
          },
          con_pass: {
            equalTo: "The password must be equal.",
            minlength: "Your password must be at least 5 characters long"
          }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
    });
});