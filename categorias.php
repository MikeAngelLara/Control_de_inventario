<?php include_once 'header.php';?> 

<?php
      # Include connection
      require_once "./config.php";

      # Define variables and initialize with empty values
      $nombre_err = $codigo_err = "";
      $nombre = $codigo = "";

      # Processing form data when form is submitted
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty(trim($_POST["nombre"]))) {
         $nombre_err = "This field is required.";
      } else {
         $nombre = ucfirst(trim($_POST["nombre"]));
         if (!ctype_alpha($nombre)) {
            $nombre_err = "Invalid name format.";
         }
      }


      if (empty(trim($_POST["codigo"]))) {
         $codigo_err = "This field is required.";
      } else {
         $codigo = trim($_POST["codigo"]);
         if (!ctype_alpha($codigo)) {
            $codigo_err = "Please enter a valid age number";
         }
      }

      # Check input errors before inserting data into database
      if (empty($nombre_err) && empty($codigo_err)) {
         # Preapre an insert statement
         $sql = "INSERT INTO categorias (nombre, codigo) VALUES (?, ?)";

         if ($stmt = mysqli_prepare($link, $sql)) {
            # Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_nombre, $param_codigo);

            # Set parameters
            $param_nombre = $nombre;
            $param_codigo = $codigo;

            # Execute the statement
            if (mysqli_stmt_execute($stmt)) {
            echo "<script>" . "alert('Nueva categoría creada.');" . "</script>";
            echo "<script>" . "window.location.href='./categorias.php'" . "</script>";
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


<style>
.button-1 {
  border-radius: 4px;
  background-color: #2e57af;
  border: none;
  color: #fff;
  text-align: center;
  font-size: 20px;
  padding: 7px;
  width: 250px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 20px;
  box-shadow: 0 10px 20px -8px rgba(0, 0, 0,.7);
  padding-right: 30px; 
  padding-left: 30px;
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
  top: 6px;
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

.b-delete{
   background-color: #e62222;
   width: 40px;
   height: 30px;
}

.b-delete:hover{
   background-color: #e61919;
}

.icon-delete{
   color: #fff;
}

.b-editar{
      width: 50px;
      height: 30px;
}
</style>


               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2 style="text-align: center;"><b>Categorías</b></h2>                           </div>
                        </div>
                     </div>

                     <!-- row -->
                     <div class="row">
                        
                        <!-- table section -->
                        <div class="col-md-12">

                        <div class="white_shd full margin_bottom_30">

                        <div class="container">
                        <button class="button-1" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span><b>Agregar categoría</b></span></button>

                              <!-- Table starts here -->
                              <table class="table table-bordered table-striped align-middle">
                                 <thead>
                                 <tr style="width: 100%;">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th>Acción</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 # Include connection
                                 require_once "./config.php";

                                 # Attempt select query execution
                                 $sql = "SELECT * FROM categorias";

                                 if ($result = mysqli_query($link, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                       $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                       $count = 1;
                                       foreach ($rows as $row) { ?>
                                       <tr>
                                          <td><?= $count++; ?></td>
                                          <td><?= $row["nombre"]; ?></td>
                                          <td><?= $row["codigo"]; ?></td>
                                          <td>
                                             <a href="./update_categorias.php?id=<?= $row["id"]; ?>" class="btn btn-primary b-editar btn-sm">
                                             <i class="fa fa-pencil"></i>
                                             </a>&nbsp;
                                             <a href="#Modal-d" data-toggle="modal" class="btn b-delete btn-sm">
                                             <i class="fa fa-trash icon-delete"></i>
                                             </a>
                                          </td>
                                       </tr>
                                       <?php
                                       }
                                       # Free result set
                                       mysqli_free_result($result);
                                    } else { ?>
                                       <tr>
                                       <td class="text-center text-danger fw-bold" colspan="9">** No records were found **</td>
                                       </tr>
                                 <?php
                                    }
                                 }
                                 # Close connection
                                 mysqli_close($link);
                                 ?>
                                 </tbody>
                              </table>
                           </div>
                     </div>
                     </div>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>

 

      <!-- Modal agregar -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel" style="margin-left: 28%; color: #2e57af; letter-spacing: 2px;"><b>Agregar categoría</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <div>
                  <!-- form starts here -->
                  <form style="height: 100%; wight: 100%;" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="bg-light p-4 shadow-sm" method="post" novalidate>
                     <div class="row gy-3" >
                        <div class="col-lg-6">
                        <label for="nombre" class="form-label" style="color: #4b4b4b; font-size: 17px;"><b>Nombre</b></label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $nombre; ?>">
                        <small class="text-danger"><?= $nombre_err; ?></small>
                        </div>
                        <div class="col-lg-6">
                        <label for="codigo" class="form-label" style="color: #4b4b4b; font-size: 17px;"><b>Código</b></label>
                        <input type="text" class="form-control" name="codigo" id="codigo" value="<?= $codigo; ?>">
                        <small class="text-danger"><?= $codigo_err; ?></small>
                        </div>

                        <div class="col-lg-12" style="margin-left: 50%;">
                        <button type="submit" class="btn btn-primary" 
                                             style="background-color: #2e57af; border: none; 
                                             width: 200px; box-shadow: 0 10px 20px -8px rgba(0, 0, 0,.7);
                                             font-size: 17px;
                                             padding: 7px;"><b>Agregar</b></button>
                        </div>
                     </div>
                  </form>
                  <!-- form ends here -->
                  </div>
            </div>
         </div>
      </div>
      </div>

      <!-- Modal eliminar -->
      <div id="Modal-d" class="modal fade">
      <div class="modal-dialog modal-confirm">
         <div class="modal-content">
            <div class="modal-header flex-column">						
               <h4 class="modal-title"><b>¿Estas seguro?</b></h4>	
            </div>
            <div class="modal-body" style="text-align: center;">
               <p><b>Si eliminas esta categoría, será de manera definitiva!</b></p>
            </div>
            <div class="modal-footer justify-content-center">
               <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancelar</b></button>
               <button type="button" class="btn btn-danger"><a style="color: #fff;" href="./delete_categorias.php?id=<?= $row["id"]; ?>"><b>Eliminar</b></a></button>
            </div>
         </div>
      </div>
   </div>

      <?php include_once 'footer.php';?>
   
   </body>
</html>