<?php include_once 'header.php';?>
<?php include_once 'config.php';?>

<style>
.wrapper{
  width: 100%;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.12);
}
.wrapper header{
  display: flex;
  align-items: center;
  padding: 25px 30px 10px;
  justify-content: space-between;
}
header .icons{
  display: flex;
}
header .icons span{
  height: 38px;
  width: 38px;
  margin: 0 1px;
  cursor: pointer;
  color: #878787;
  text-align: center;
  line-height: 38px;
  font-size: 1.9rem;
  user-select: none;
  border-radius: 50%;
}
.icons span:last-child{
  margin-right: -10px;
}
header .icons span:hover{
  background: #f2f2f2;
}
header .current-date{
  font-size: 1.45rem;
  font-weight: 500;
}
.calendar{
  padding: 20px;
}
.calendar ul{
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  text-align: center;
}
.calendar .days{
  margin-bottom: 20px;
}
.calendar li{
  color: #333;
  width: calc(100% / 7);
  font-size: 1.07rem;
}
.calendar .weeks li{
  font-weight: 500;
  cursor: default;
}
.calendar .days li{
  z-index: 1;
  cursor: pointer;
  position: relative;
  margin-top: 30px;
}
.days li.inactive{
  color: #aaa;
}
.days li.active{
  color: #fff;
  font-weight: bold;
}
.days li::before{
  position: absolute;
  content: "";
  left: 50%;
  top: 50%;
  height: 40px;
  width: 40px;
  z-index: -1;
  border-radius: 50%;
  transform: translate(-50%, -50%);
}
.days li.active::before{
  background: #2e57af;
}
.days li:not(.active):hover::before{
  background: #f2f2f2;
}
</style>

               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Principal</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-6 col-lg-4">
                           <div class="full counter_section margin_bottom_30 cuadros_dash">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-book" style="color: #2e57af;"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no" style="color: black;">Número de artículos</p>
                                    <p class="head_couter" style="color: black; font-size: 25px;">
                                    <b>
                                    <?php 
                                    $sql = "SELECT COUNT(*) AS total_filas FROM articulos";
                                    $result = mysqli_query($link, $sql);
                                    
                                    $row = mysqli_fetch_assoc($result);
                                    $numero_filas = $row["total_filas"]; 
                                    
                                    echo $numero_filas;
                                    ?>
                                    </b>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                           <div class="full counter_section margin_bottom_30 cuadros_dash">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-truck" style="color: #2e57af;"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no" style="color: black;">Número de proveedores</p>
                                    <p class="head_couter" style="color: black; font-size: 25px;">
                                    <b>
                                    <?php 
                                    $sql = "SELECT COUNT(*) AS total_filas FROM proveedores";
                                    $result = mysqli_query($link, $sql);
                                    
                                    $row = mysqli_fetch_assoc($result);
                                    $numero_filas = $row["total_filas"]; 
                                    
                                    echo $numero_filas;
                                    ?>
                                    </b>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                           <div class="full counter_section margin_bottom_30 cuadros_dash">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-file-text" style="color: #2e57af;"></i>
                                 </div>
                              </div>                       
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no" style="color: black;">Bitácora</p>
                                    <p class="head_couter" style="color: black;">**** cambios en el inventario</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <!-- row -->
                     <div class="row column4 graph">
                        <!-- tab style 1 -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head" style="background-color: #2e57af;">
                                 <div style="color: white; text-align: center; font-size: 15px;">
                                    <h2 style="font-size: 22px;">Mapa</h2>
                                 </div>
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style1">
                                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d981.2552162424246!2d-67.04046771927116!3d10.340215128683822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a8cfde2b51533%3A0x2bdc09e0b3ac150!2sPalacio%20de%20Justicia!5e0!3m2!1ses-419!2sve!4v1714148101684!5m2!1ses-419!2sve" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- tab style 2 -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head" style="background-color: #2e57af;">
                                 <div style="color: white; text-align: center; font-size: 15px;">
                                    <h2 style="font-size: 22px;">Calendario</h2>
                                 </div>
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style2">
                                       <div class="wrapper">
                                          
                                          <header>
                                          
                                          <p class="current-date"></p>
                                          <div class="icons">
                                             <span id="prev" class="material-symbols-rounded"><i class="fa fa-arrow-left" style="color: #2e57af;"></i></span>
                                             <span id="next" class="material-symbols-rounded"><i class="fa fa-arrow-right" style="color: #2e57af;"></i></span>
                                          </div>
                                          </header>
                                          <div class="calendar">
                                          <ul class="weeks">
                                             <li>Dom</li>
                                             <li>Lun</li>
                                             <li>Mar</li>
                                             <li>Mie</li>
                                             <li>Jue</li>
                                             <li>Vie</li>
                                             <li>Sab</li>
                                          </ul>
                                          <ul class="days"></ul>
                                          </div>
                                       </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               <!-- end dashboard inner -->
            </div>



               



               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->

      <?php include_once 'footer.php';?>

   </body>
</html>