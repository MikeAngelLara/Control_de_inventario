<?php
# Include connection
require_once "./config.php";

# Define variables and initialize with empty values
$nombre_err = $herramienta_err = $estado_err = $ubicacion_err = $devuelto_err = $observaciones_err = "";
$nombre = $herramienta = $estado = $ubicacion = $devuelto = $observaciones = "";

# Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
  # Get hidden input value
  $id = $_POST["id"];

  if (empty(trim($_POST["nombre"]))) {
    $nombre_err = "This field is required.";
  } else {
    $nombre = ucfirst(trim($_POST["nombre"]));
    if (!ctype_alpha($nombre)) {
      $nombre_err = "Invalid name format.";
    }
  }

  if (empty(trim($_POST["herramienta"]))) {
    $herramienta_err = "This field is required.";
  } else {
    $herramienta = ucfirst(trim($_POST["herramienta"]));
    if (!ctype_alpha($herramienta)) {
      $herramienta_err = "Invalid name format.";
    }
  }

  if (empty(trim($_POST["estado"]))) {
    $estado_err = "This field is required.";
  } else {
    $estado = trim($_POST["estado"]);
    if (!ctype_alpha($estado)) {
      $estado_err = "Please enter a valid age number";
    }
  }

  if (empty(trim($_POST["ubicacion"]))) {
    $ubicacion_err = "This field is required.";
  } else {
    $ubicacion = trim($_POST["ubicacion"]);
    if (!ctype_alpha($ubicacion)) {
      $ubicacion_err = "Please enter a valid age number";
    }
  }

  if (empty(trim($_POST["devuelto"]))) {
    $devuelto_err = "This field is required.";
  } else {
    $devuelto = trim($_POST["devuelto"]);
    if (!ctype_alpha($devuelto)) {
      $devuelto_err = "Please enter a valid age number";
    }
  }

  if (empty(trim($_POST["observaciones"]))) {
    $observaciones_err = "This field is required.";
  } else {
    $observaciones = trim($_POST["observaciones"]);
    if (!ctype_alpha($observaciones)) {
      $observaciones_err = "Please enter a valid age number";
    }
  }




  # Check input errors before updating data from database
  if (empty($nombre_err) && empty($herramienta_err) && empty($estado_err) && empty($ubicacion_err) && empty($devuelto_err) && empty($observaciones_err)) {
    # Preapre an update statement
    $sql = "UPDATE prestamos SET nombre = ?, herramienta = ?, estado = ?, ubicacion = ?, devuelto = ?, observaciones = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssssi", $param_nombre, $param_herramienta, $param_estado, $param_ubicacion, $param_devuelto, $param_observaciones, $param_id);

      # Set parameters
      $param_nombre = $nombre;
      $param_herramienta = $herramienta;
      $param_estado = $estado;
      $param_ubicacion = $ubicacion;
      $param_devuelto = $devuelto;
      $param_observaciones = $observaciones;
      $param_id = $id;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "alert('Préstamo actualizado con exito ✓');" . "</script>";
        echo "<script>" . "window.location.href='./prestamos.php'" . "</script>";
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
    $sql = "SELECT * FROM prestamos WHERE id = ?";

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
          $estado = $row["estado"];
          $ubicacion = $row["ubicacion"];
          $devuelto = $row["devuelto"];
          $observaciones = $row["observaciones"];

        } else {
          # URL doesn't contain valid id parameter. Redirect to index page
          echo "<script>" . "window.location.href='./prestamos.php'" . "</script>";
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
    echo "<script>" . "window.location.href='./prestamos.php'" . "</script>";
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
  <title>Editar Préstamo</title>
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
              <label for="estado" class="form-label"><b>Estado</b></label>
              <input type="text" class="form-control" name="estado" id="estado" value="<?= $estado; ?>">
              <small class="text-danger"><?= $estado_err; ?></small>
            </div>
            <div class="col-lg-6 center">
              <label for="ubicacion" class="form-label"><b>Ubicación</b></label>
              <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="<?= $ubicacion; ?>">
              <small class="text-danger"><?= $ubicacion_err; ?></small>
            </div>
            <div class="col-lg-6 center">
              <label for="devuelto" class="form-label"><b>Devuelto</b></label>
              <input type="text" class="form-control" name="devuelto" id="devuelto" value="<?= $devuelto; ?>">
              <small class="text-danger"><?= $devuelto_err; ?></small>
            </div>
            <div class="col-lg-6 center">
              <label for="observaciones" class="form-label"><b>Observaciones</b></label>
              <input type="text" class="form-control" name="observaciones" id="observaciones" value="<?= $observaciones; ?>">
              <small class="text-danger"><?= $observaciones_err; ?></small>
            </div>
            <div class="col-lg-12 d-grid">
              <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
              <button type="submit" class="button-1" class="btn btn-primary"><b>Actualizar</b></button>
            </div>
            <a class="regresar" href="prestamos.php"><b>Cancelar  ⬅</b></a>
          </div>
        </form>
        <!-- form ends here -->
      </div>
    </div>
  </div>
</body>