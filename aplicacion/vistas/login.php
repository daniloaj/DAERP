<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>DAERP</title>
    <link href="<?php echo URL;?>publico/css/login.css"  rel="stylesheet">
  </head>
<body class="text-center">
    
  <main class="form-signin">
  <form action="login.php" id="formlogin" method="post">

    <img class="logo" src="<?php echo URL;?>publico/images/logo.png">

    <div class="form-floating">
      <select class="form-control text-capitalize" name="depa" id="depa">
          <?php
          // Verificamos la conexión con el servidor y la base de datos
          $mysqli = new mysqli('localhost', 'root', 'asd', 'daerp');
          $query = $mysqli->query("SELECT id_dep, nom_depa FROM departamentos ");
          echo '<option value="0">Departamento</option>';
          while ($valores = mysqli_fetch_array($query)) {
              echo '<option value="' . $valores[id_dep] . '">' . $valores[nom_depa] . '</option>';
          }
          ?>
      </select>
      <label for="floatingInput">Departamento</label>
    </div>

    <br>

    <div class="form-floating">
      <input name="usuario" type="text" class="form-control" id="floatingInput" placeholder="Usuario">
      <label for="floatingInput">Usuario</label>
    </div>

    <br>

    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>

    <div class="alert alert-danger d-none mt-3" role="alert" id="mensaje">
      Mensaje
    </div>
    
    <br>

    <button class="w-100  btn-lg btn btn-primary" type="submit">Iniciar Sesion</button>
    <p class="mt-5 mb-3 text-muted">&copy; DAERP</p>
  </form>
  </main>
    <script src="<?php echo URL?>publico/customjs/api.js"></script>
    <script src="<?php echo URL?>publico/customjs/login.js"></script>
  </body>
</html>