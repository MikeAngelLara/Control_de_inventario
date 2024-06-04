<?php
# Include connection
require_once "./config.php";

# Define variables and initialize with empty values
$categoria_err = $nombre_err = $ud_err = $existencia_err = "";
$categoria = $nombre = $ud = $existencia = "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["categoria"]))) {
    $categoria_err = "This field is required.";
  } else {
    $categoria = ucfirst(trim($_POST["categoria"]));
    if (!ctype_alpha($categoria)) {
      $categoria_err = "Invalid name format.";
    }
  }

  if (empty(trim($_POST["nombre"]))) {
    $nombre_err = "This field is required.";
  } else {
    $nombre = ucfirst(trim($_POST["nombre"]));
    if (!ctype_alpha($nombre)) {
      $nombre_err = "Invalid name format.";
    }
  }


  if (empty(trim($_POST["ud"]))) {
    $ud_err = "This field is required.";
  } else {
    $ud = trim($_POST["ud"]);
    if (!ctype_alpha($ud)) {
      $ud_err = "Please enter a valid age number";
    }
  }


  if (empty(trim($_POST["existencia"]))) {
    $existencia_err = "This field is required.";
  } else {
    $existencia = trim($_POST["existencia"]);
    if (!ctype_digit($existencia)) {
      $existencia_err = "Please enter a valid age number";
    }
  }

 
  # Check input errors before inserting data into database
  if (empty($categoria_err) && empty($nombre_err) && empty($ud_err) && empty($existencia_err)) {
    # Preapre an insert statement
    $sql = "INSERT INTO articulos (categoria, nombre, ud, existencia) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssi", $param_categoria, $param_nombre, $param_ud, $param_existencia);

      # Set parameters
      $param_categoria = $categoria;
      $param_nombre = $nombre;
      $param_ud = $ud;
      $param_existencia = $existencia;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
                // __________________________________________________________________________________________BITACORA____________________________________________________________________________
                $fecha_hora = date('Y-m-d H:i:s');
                $accion = "Create";
                $param_id = $_SESSION["id"];
                $consulta_bitacora = "INSERT INTO bitacora (nombre, fecha_accion, id_usuario) VALUES ('$accion','$fecha_hora','$param_id')";
                mysqli_query($link, $consulta_bitacora);
                // __________________________________________________________________________________________BITACORA____________________________________________________________________________

        echo "<script>" . "alert('Nuevo artículo creado.');" . "</script>";
        echo "<script>" . "window.location.href='./inventario.php'" . "</script>";
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <title>PHP CRUD Operations</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <!-- form starts here -->
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="bg-light p-4 shadow-sm" method="post" novalidate>
          <div class="row gy-3">
            <div class="col-lg-6">
              <label for="categoria" class="form-label">Categoría</label>
              <input type="text" class="form-control" name="categoria" id="categoria" value="<?= $categoria; ?>">
              <small class="text-danger"><?= $categoria_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $nombre; ?>">
              <small class="text-danger"><?= $nombre_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="ud" class="form-label">Ud</label>
              <input type="text" class="form-control" name="ud" id="ud" value="<?= $ud; ?>">
              <small class="text-danger"><?= $ud_err; ?></small>
            </div>
            <div class="col-lg-6">
              <label for="existencia" class="form-label">Existencia</label>
              <input type="text" class="form-control" name="existencia" id="existencia" value="<?= $existencia; ?>">
              <small class="text-danger"><?= $existencia_err; ?></small>
            </div>


            <div class="col-lg-12 d-grid">
              <button type="submit" class="btn btn-primary">Agregar artículo</button>
            </div>
          </div>
        </form>
        <!-- form ends here -->
      </div>
    </div>
  </div>
</body>

</html>