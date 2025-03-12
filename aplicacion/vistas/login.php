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
        <label for="floatingInput">Usuario</label>
      </div>

      <br>

      <div class="form-floating">
        <input name="password" type="password" class="form-control inputs" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Contraseña</label>
      </div>

      <div class="alert alert-danger d-none mt-3" role="alert" id="mensaje">
        Mensaje
      </div>


      <br>

      <button class="w-100 btn-lg btn btn-primary inputs" type="submit">Iniciar Sesion</button>
      <br>
      <div class="mt-3 forgot_pass">
        Olvidé mi contraseña
      </div>

      <select name="language" id="language" class="form-control mt-3 inputs " >
        <option value="en">Inglés</option>
        <option value="es">Español</option>
      </select>
    </form>
  </div>

  <script src="<?php echo URL ?>publico/customjs/api.js"></script>
  <script src="<?php echo URL ?>publico/customjs/login.js"></script>
</body>

</html>