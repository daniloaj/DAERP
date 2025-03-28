<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>DAERP</title>
  <link href="<?php echo URL; ?>publico/css/login.css" rel="stylesheet">
</head>

<body class="text-center">


  <div class="form-signin">
    <form action="login.php" id="formlogin" method="post">
      <img class="logo mt-3" src="<?php echo URL; ?>publico/images/logo.png">

      <div class="form-floating">
        <input name="usuario" type="text" class="form-control inputs" id="floatingInput" placeholder="Usuario">
        <label id="user" for="floatingInput"></label>
      </div>

      <br>

      <div class="form-floating">
        <input name="password" type="password" class="form-control inputs" id="floatingPassword" placeholder="Password">
        <label id="pass" for="floatingPassword"></label>
      </div>

      <div class="alert alert-danger d-none mt-3" role="alert" id="mensaje">

      </div>

      <br>

      <button class="w-100 btn-lg btn btn-primary inputs" id="login_b" type="submit"></button>
      <br>
      <div href="#modal_mails" data-bs-toggle="modal" class="mt-3 forgot_pass" id="forgot_pass">
      </div>

      <select name="language" id="language" class="form-control mt-3 inputs ">
        <option value="es">Español</option>
        <option value="en">English</option>
      </select>
    </form>
  </div>

  <!-- send mail forgot password -->
  <div style="z-index: 9000" class="modal fade" data-bs-backdrop="static" id="modal_mails" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content inputs">
        <div class="container">
          <div class="modal-body">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            <h3 class='centrar' id="title_forgot_pass">

            </h3>
            <hr>    
            <p id="message_forgot_pass">

            </p>
            <div class="form-floating">
              <input name="mail_pass" class="inputs form-control forgot_inputs" id="mail_pass" placeholder="mail">
              <label id="mail_forgot_pass" for="mail_pass"></label>
            </div>

            <div class="form-floating mt-3">
              <input name="user_forgot_pass" class="inputs form-control forgot_inputs" id="user_forgot" placeholder="mail">
              <label id="user_forgot_pass" for="user_forgot_pass"></label>
            </div>

            <div class="centrar mt-3">
              <button id="cancelar_mail" class=" w-25 btn btn-secondary">Cancelar</button>
              <button id="send_mail" class=" w-25 btn btn-primary disabled">Enviar</button>
              <button id="loading" class="w-25 btn btn-primary d-none" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div href="#modal_rehacer_pass" data-bs-toggle="modal" class="mt-3 forgot_pass d-none" id="rehacer_contra">
      </div>
  <!-- rehacer la contra -->
  <div style="z-index: 9000" class="modal fade" data-bs-backdrop="static" id="modal_rehacer_pass" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content inputs">
        <div class="container">
          <div class="modal-body">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            <h3 class='centrar' id="reset_pass_title">

            </h3>
            <hr>    
            <p id="message_reset_pass">

            </p>
            <div class="form-floating">
              <input name="pass_reset" type="password" class="inputs form-control forgot_inputs" id="new_pass" placeholder="mail">
              <label id="pass_reset" for="pass_reset"></label>
            </div>

            <div class="form-floating mt-3">
              <input name="repeat_pass" type="password" class="inputs form-control forgot_inputs" id="repeat_new_pass" placeholder="mail">
              <label id="repeat_pass" for="repeat_pass"></label>
            </div>
            <div class="mt-3">
              <label id="no_match" class="error_message d-none" ></label>
            </div>

            <div class="centrar mt-3">
              <button id="cancelar_reset_password" class=" w-25 btn btn-secondary">Cancelar</button>
              <button id="change_pass" class=" w-25 btn btn-primary disabled">Enviar</button>
              <button id="loading_pass" class="w-25 btn btn-primary d-none" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "aplicacion/vistas/partes/javascript.php"; ?>
  <?php include "publico/customjs/login.js.php" ?>
  <script src="<?php echo URL ?>publico/customjs/api.js"></script>
  <script src="<?php echo URL ?>publico/customjs/login.js"></script>
</body>

</html>