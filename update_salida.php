<?php
# Include connection
require_once "./config.php"; 

# Define variables and initialize with empty values
$nombre_err = $herramienta_err = $ubicacion_err = $responsable_err = $fecha_err ="";
$nombre = $herramienta = $ubicacion = $responsable = $fecha = "";

# Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
  # Get hidden input value
  $id = $_POST["id"];

  if (empty(trim($_POST["nombre"]))) {
    $nombre_err = "This field is required.";
  } else {
    $nombre = ucfirst(trim($_POST["nombre"]));
  }

  if (empty(trim($_POST["herramienta"]))) {
    $herramienta_err = "This field is required.";
  } else {
    $herramienta = ucfirst(trim($_POST["herramienta"]));
  }

  if (empty(trim($_POST["ubicacion"]))) {
    $ubicacion_err = "This field is required.";
  } else {
    $ubicacion = trim($_POST["ubicacion"]);
  }

  if (empty(trim($_POST["responsable"]))) {
    $responsable_err = "This field is required.";
  } else {
    $responsable = trim($_POST["responsable"]);
  }


  # Check input errors before updating data from database
  if (empty($nombre_err) && empty($herramienta_err) && empty($ubicacion_err) && empty($responsable_err)) {
    # Preapre an update statement
    $sql = "UPDATE salida SET nombre = ?, herramienta = ?, ubicacion = ?, responsable = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssi", $param_nombre, $param_herramienta, $param_ubicacion, $param_responsable, $param_id);

      # Set parameters
      $param_nombre = $nombre;
      $param_herramienta = $herramienta;
      $param_ubicacion = $ubicacion;
      $param_responsable = $responsable;
      $param_id = $id;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "alert('Registro de salida actualizado con exito ✓');" . "</script>";
        echo "<script>" . "window.location.href='./salida.php'" . "</script>";
        exit;
      } else {
        echo "Ha ocurrido un error, intente más tarde";
      }
    }
 
    # Close statement
    mysqli_stmt_close($stmt);
  }

  # Close connection
  mysqli_close($link);
} else {
  # Check if URL contains id parameter before processing further
  if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    # Get URL paramater
    $id = trim($_GET["id"]);

    # Prepare a select statement
    $sql = "SELECT * FROM salida WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "i", $param_id);

      # Set Parameters
      $param_id = $id;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
          # Fetch result row as an associative array
          $row = mysqli_fetch_array($result);

          # Retrieve individual field value
          $nombre = $row["nombre"];
          $herramienta = $row["herramienta"];
          $ubicacion = $row["ubicacion"];
          $responsable = $row["responsable"];
        } else {
          # URL doesn't contain valid id parameter. Redirect to index page
          echo "<script>" . "window.location.href='./salida.php'" . "</script>";
          exit;
        }
      } else {
        echo "Ha ocurrido un error, intente más tarde";
      }
    }
    # Close statement
    mysqli_stmt_close($stmt);
 
    # Close connection
    mysqli_close($link);
  } else {
    # Redirect to index.php if URL doesn't contain id parameter
    echo "<script>" . "window.location.href='./salida.php'" . "</script>";
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Editar Artículo</title>
  <link rel="shortcut icon" href="images/logo/DEM.png">
</head>

<style>
body{
  background: url("images/layout_img/fondo_index.JPG");
  background-size: cover;
  background-repeat: no-repeat;
}

.border{
  border-radius: 10px;
  border-color: #2e57af;
  -webkit-box-shadow: 0px 15px 28px -3px rgba(51,82,255,0.14);
-moz-box-shadow: 0px 15px 28px -3px rgba(51,82,255,0.14);
box-shadow: 0px 15px 28px -3px rgba(51,82,255,0.14);
}

.button-1 {
  border-radius: 4px;
  background-color: #2e57af;
  border: none;
  color: white;
  text-align: center;
  font-size: 20px;
  padding: 13px;
  width: 250px;
  transition: all 0.5s;
  cursor: pointer;
  margin-left: 25%;
  box-shadow: 0 10px 20px -8px rgba(0, 0, 0,.7);
  padding-right: 50px; 
  padding-left: 50px;
}

.button-1{
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button-1:after {
  content: '➜';
  position: absolute;
  opacity: 0;  
  top: 13px;
  right: -20px;
  transition: 0.5s;
}

.button-1:hover{
  padding-right: 24px;
  padding-left:8px;
}

.button-1:hover:after {
  opacity: 1;
  right: 10px;
}

.center{
  text-align: center;
}

.regresar{
    text-decoration: none;
    color: black;
    font-size: 18px;
}
</style>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6" style="margin-top: 23%;">
        <!-- form starts here -->
        <form action="<?= htmlspecialchars(basename($_SERVER["REQUEST_URI"]));  ?>" class="bg-light p-4 border" method="post" novalidate>
          <div class="row gy-3">
            <div class="col-lg-6 center">
              <label for="nombre" class="form-label"><b>Nombre</b></label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $nombre; ?>">
              <small class="text-danger"><?= $nombre_err; ?></small>
            </div>
            <div class="col-lg-6 center">
              <label for="herramienta" class="form-label"><b>Herramienta</b></label>
              <input type="text" class="form-control" name="herramienta" id="herramienta" value="<?= $herramienta; ?>">
              <small class="text-danger"><?= $herramienta_err; ?></small>
            </div>
            <div class="col-lg-6 center">
              <label for="ubicacion" class="form-label"><b>Ubicación</b></label>
              <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="<?= $ubicacion; ?>">
              <small class="text-danger"><?= $ubicacion_err; ?></small>
            </div>
            <div class="col-lg-6 center">
              <label for="responsable" class="form-label"><b>Responsable</b></label>
              <input type="text" class="form-control" name="responsable" id="responsable" value="<?= $responsable; ?>">
              <small class="text-danger"><?= $responsable_err; ?></small>
            </div>
            <div class="col-lg-12 d-grid">
              <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
              <button type="submit" class="button-1" class="btn btn-primary"><b>Actualizar</b></button>
            </div>
            <a class="regresar" href="inventario.php"><b>Cancelar  ⬅</b></a>
          </div>
        </form>
        <!-- form ends here -->
      </div>
    </div>
  </div>
</body>