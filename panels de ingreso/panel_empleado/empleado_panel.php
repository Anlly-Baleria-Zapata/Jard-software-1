<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <!-- Enlaces a estilos y scripts externos -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../panel_empleado/stylesBoostrap/style_bienv_empleado.css">

</head>


<body>
  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="#">
      <img src="../panel_gerencia/logo/jard.png" alt="logo de pagina" style="width: 40px;"> jard
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="../panel_empleado/empleado_panel.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="../panel_empleado/computadores/index.php">Computadores</a></li>
        <li class="nav-item"><a class="nav-link" href="../panel_empleado/ubicacion/index.php">Ubicación</a></li>
      </ul>
    </div>
  </nav>

  <!-- Título y caja de bienvenida -->
  <div class="caja">
    <h1>Bienvenido a Jard Software (empleado)</h1>
    <img src="../panel_gerencia/logo/jard.png" alt="Imagen de Jard Software">
  </div>

  <!-- Formulario para continuar -->
  <div class="container">
    <button class="button" onclick="redirectToIndex()">Continuar</button>
  </div>


  <script>

    // reidreccion al formulario de los equipos
    function redirectToIndex() {
      window.location.href = "../panel_empleado/computadores/index.php";
    }

  </script>


</body>

</html>


