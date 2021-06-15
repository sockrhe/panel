<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Panel - Registro</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form id="quickForm" action="" method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos">
        </div>
        <div class="form-group">
            <label for="nickname">Nickname</label>
            <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group">
            <label for="password">Confirmar Contraseña</label>
            <input type="password" name="con_password" id="con_password" class="form-control" placeholder=" Confirmar Contraseña">
        </div>
        <div class="row">
          <div class="col-4"></div>
          <div class="col-4"></div>
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/sweetalert.min.js"></script>
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
        var form = $('#quickForm').serialize();
        $.ajax({
            url: 'registrar-usuario.php',
            type: 'POST',
            data: form
        }).done(function(data) {
            if (data == 1){
              swal({
                title: "Correcto",
                text: "Usuario registrado correctamente.",
                icon: "success",
                button: "Aceptar",
              });
              window.setTimeout(function(){location.replace('index.php')},3000);
            } 
            if (data == 2){
              swal({
                title: "Registro",
                text: "Las contraseñas no coinciden.",
                icon: "warning",
                button: "Aceptar",
              });
            }
            if (data == 3) {
              swal({
                title: "Registro",
                text: "El nickname ya existe.",
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
  $('#quickForm').validate({
    rules: {
      nombre: {
        required: true
      },
      apellidos: {
        required: true
      },
      nickname: {
        required: true
      },
      password: {
        required: true,
        minlength: 5
      },
      con_password: {
        equalTo: '#password',
        minlength: 5
      }
    },
    messages: {
      nombre: {
        required: "El nombre es obligatorio."
      },
      apellidos: {
        required: "Los apellidos son obligatorios."
      },
      nickname: {
        required: "El nickname es obligatorio."
      },
      password: {
        required: "La contraseña es obligatoria.",
        minlength: "La contraseña debe tener minimo 5 caracteres."
      },
      con_password: {
        equalTo: "Deben coincidir las contraseñas.",
        minlength: "La contraseña debe tener minimo 5 caracteres."
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
</script>
</body>
</html>
