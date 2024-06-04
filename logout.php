<?php
// Initialize the session
session_start();
// Unset all of the session variables

require_once("config.php"); 
                // __________________________________________________________________________________________BITACORA____________________________________________________________________________
                if (isset($_SESSION["id"])) {
                    $param_id = $_SESSION["id"];
                
                    // Check if user ID exists
                    $user_exists_query = "SELECT id FROM users WHERE id = $param_id";
                    $user_result = mysqli_query($link, $user_exists_query);
                
                    if (mysqli_num_rows($user_result) > 0) {
                        // User exists, proceed with INSERT
                        $fecha_hora = date('Y-m-d H:i:s');
                $accion = "Cierre de sesión";
                        $consulta_bitacora = "INSERT INTO bitacora (nombre, fecha_accion, id_usuario) VALUES ('$accion','$fecha_hora','$param_id')";
                        mysqli_query($link, $consulta_bitacora);
                    } else {
                        // User ID not found, handle the error
                        echo "User with ID $param_id not found.";
                    }
                } else {
                    // Handle missing user ID in session (as before)
                }
                // __________________________________________________________________________________________BITACORA____________________________________________________________________________
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
