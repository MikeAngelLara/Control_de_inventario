<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->

      <!-- site metas -->
      <title>Proveeduría DEM</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="shortcut icon" href="images/logo/DEM.png">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="style_calendar.css" />

      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/color_2.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css">
      
      <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
      <script defer src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
      <script defer src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>
      <script defer src="js/calendar.js"></script>

      <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

   </head>
   <body class="dashboard dashboard_2">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="logo_section" style="width: 100%;">
                    <a href="dashboard.php"><img class="img-responsive" src="images/logo/tsjblue.png" alt="#" style="width: 100px;"/></a>
                </div>

               <div class="sidebar_blog_2">
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="dashboard.php"><i class="fa fa-dashboard" style="color: #2e57af;"></i><span>Principal</span></a>
                     </li>
                     <br>
                     <li><a href="inventario.php"><i class="fa fa-book" style="color: #2e57af;"></i> <span>Inventario</span></a></li>
                     <li><a href="inventario_lagunetica.php"><i class="fa fa-book" style="color: #2e57af;"></i> <span>Inventario Lagunetica</span></a></li>
                     <li><a href="categorias.php"><i class="fa fa-file-text" style="color: #2e57af;"></i> <span>Categorías</span></a></li>
                     <li><a href="proveedores.php"><i class="fa fa-truck" style="color: #2e57af;"></i> <span>Proveedores</span></a></li>
                     <br>
                     <li><a href="salida.php"><i class="fa fa-arrow-right" style="color: #2e57af;"></i> <span>Salida</span></a></li>
                     <br>
                     <li><a href="tablas_plantilla.php"><i class="fa fa-table" style="color: #2e57af;"></i> <span>tablas plantilla</span></a></li>
                     <li><a href="widgets.php"><i class="fa fa-clock-o" style="color: #2e57af;"></i> <span>Widgets</span></a></li>
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond" style="color: #2e57af;"></i> <span>Elements</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="general_elements.php">> <span>General Elements</span></a></li>
                           <li><a href="media_gallery.php">> <span>Media Gallery</span></a></li>
                           <li><a href="icons.php">> <span>Icons</span></a></li>
                           <li><a href="invoice.php">> <span>Invoice</span></a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group" style="color: #2e57af;"></i> <span>Apps</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="email.php">> <span>Email</span></a></li>
                           <li><a href="calendar.php">> <span>Calendar</span></a></li>
                           <li><a href="media_gallery.php">> <span>Media Gallery</span></a></li>
                        </ul>
                     </li>
                     <li><a href="price.php"><i class="fa fa-briefcase" style="color: #2e57af;"></i> <span>Pricing Tables</span></a></li>
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone" style="color: #2e57af;"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="perfil.php">> <span>Perfil</span></a>
                           </li>
                           <li>
                              <a href="project.php">> <span>Projects</span></a>
                           </li>
                           <li>
                              <a href="404_error.php">> <span>404 Error</span></a>
                           </li>
                        </ul>
                     </li>
                     <li><a href="map.php"><i class="fa fa-map" style="color: #2e57af;"></i> <span>Map</span></a></li>
                     <li><a href="charts.php"><i class="fa fa-bar-chart-o" style="color: #2e57af;"></i> <span>Charts</span></a></li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar" style="background-color: #2e57af;">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle" style="background-color: #2e57af;"><i class="fa fa-bars"></i></button>         
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li>
                                    <a href="#" data-toggle="dropdown"><i class="fa fa-bell-o" style="color: #fff;"></i><span class="badge">0</span>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">Dropdown link</a>
                                          <a class="dropdown-item" href="#">Dropdown link</a>
                                          <a class="dropdown-item" href="#">Dropdown link</a>
                                       </div>
                                    </a>
                                 </li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li style="background-color: #2e57af">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/logo/admin.png" alt="#" /><span class="name_user"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="perfil.php">Mi perfil</a>
                                       <a class="dropdown-item" href="cambiar_contraseña.php">Cambiar <br> contraseña</a>
                                       <a class="dropdown-item" href="logout.php"><span>Cerrar sesión</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>

