<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  require "../../class/db/clsController.php";
  session_start();
  $obj_cnsc = new clsCnsc();
  $resultado = $obj_cnsc->ConsultarEstudianteSession($_SESSION['id']);
  $listares = mysqli_fetch_assoc($resultado);

  $resultado = $obj_cnsc->ConsultarPruebaById($_POST['id']);
  $listar = mysqli_fetch_assoc($resultado);
 ?>
    <style media="screen">
    .seleccion:hover {
      background: #8a7e7e4a;
      color: #fff;
      cursor: pointer;
    }
    </style>
        <div class="pd-ltr-20 xs-pd-20-10">
      				<div class="min-height-200px">
      					<div class="page-header">
      						<div class="row">
      							<div class="col-md-6 col-sm-12">
      								<div class="title">
      									<h4>Bienvenido a la Prueba:  <?php echo $listar['titulo']; ?></h4>
      								</div>
      							</div>
      							<div class="col-md-6 col-sm-12 text-right">
      								<div class="dropdown">
            					</div>
      							</div>
      						</div>
      					</div>
      					<div class="row">
      						<div class="col-md-12 col-sm-12 mb-30">
      							<div class="pd-20 card-box height-100-p">
      								<div class="clearfix mb-30">
      									<div class="pull-left">
      										<h4 class="text-blue h4">Prueba</h4>
                      	</div>
      								</div>
                     <div class="row"  type="button">
                       <?php
                         $resultado_cnsc = $obj_cnsc->ConsultarDetailsPruebas($_POST['id']);
                          if(mysqli_num_rows($resultado_cnsc)>0){
                            $cont = 0;
                               while ($listar = mysqli_fetch_assoc($resultado_cnsc)) {
                                $cont++;
                                if($listar['fktipo'] == "3" ){
                              ?>
                              <div class="col-md-6">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label><b>PREGUNTA <?php echo $cont; ?> :</b></label><br>
                                      <label><h5><?php echo $listar['pregunta']; ?></h5></label>
                                    </div>
                                  </div>
                                </div>

                                <?php  if($listar['opcion'] == "Arriba"){  ?>
                                <div class="dropzone" style="z-index:-1; top: 150px;width: 200px;height: 150px;" ></div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="product-img">
                                        <img src="<?php if($listar["imagen"] != "" && $listar["imagen"] != "null"){ echo "pages/preguntas/upload/".$listar["imagen"];}else{ echo "vendors/images/photo1.png";} ?>"  id="image" style="height: 170px;" alt="Product Image">
                                    </div>
                                  </div>
                                </div>
                               <?php } ?>

                               <?php  if($listar['opcion'] == "Abajo"){  ?>
                                 <div class="form-group">
                                   <div class="input-group">
                                     <div class="product-img">
                                         <img src="<?php if($listar["imagen"] != "" && $listar["imagen"] != "null"){ echo "pages/preguntas/upload/".$listar["imagen"];}else{ echo "vendors/images/photo1.png";} ?>"  id="image" style="height: 170px;" alt="Product Image">
                                     </div>
                                   </div>
                                 </div>
                               <div class="dropzone" style="z-index:-1; top: 150px;width: 200px;height: 150px;" ></div>
                              <?php } ?>
                             <?php  if($listar['opcion'] == "Derecha"){  ?>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <div class="product-img">
                                          <img src="<?php if($listar["imagen"] != "" && $listar["imagen"] != "null"){ echo "pages/preguntas/upload/".$listar["imagen"];}else{ echo "vendors/images/photo1.png";} ?>"  id="image" style="height: 170px;" alt="Product Image">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="dropzone" style="z-index:-1; top: 150px;width: 200px;height: 150px;" ></div>
                                </div>
                              </div>
                            <?php } ?>
                             <?php  if($listar['opcion'] == "Izquierda"){  ?>
                               <div class="row">
                                 <div class="col-md-6">
                                   <div class="dropzone" style="z-index:-1; top: 150px;width: 200px;height: 150px;" ></div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="form-group">
                                     <div class="input-group">
                                       <div class="product-img">
                                           <img src="<?php if($listar["imagen"] != "" && $listar["imagen"] != "null"){ echo "pages/preguntas/upload/".$listar["imagen"];}else{ echo "vendors/images/photo1.png";} ?>"  id="image" style="height: 170px;" alt="Product Image">
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                              <?php } ?>
                                <br><br>
                              </div>
                              <div class="col-md-6">
                                <?php
                                  if($listar['resultado'] == ""){
                                    $resultad = $obj_cnsc->ConsultarDetailsOpciones($listar['ID']);
                                     if(mysqli_num_rows($resultad)>0){
                                       $conta = 0;
                                          while ($listar_r = mysqli_fetch_assoc($resultad)) {
                                           $conta++;
                                      ?>
                                      <img atrib0="<?php echo $listares['id']; ?>" atrib1="<?php echo $_POST['id'];?>" atrib2="<?php echo $listar['fkpregunta'];?>" atrib3="<?php echo $listar_r['opcion'];?>" class="winston dragg" style="z-index:1;width: 120px;" src="pages/preguntas/upload/<?php echo $listar_r['imagen'];?>" alt="">
                                     <?php
                                         }
                                       }
                                     }else{
                                     ?>
                                     <div class="browser-visits">
                                        <ul>
                                          <li class="d-flex flex-wrap align-items-center">
                                            <div class="browser-name badge badge-pill badge-success">Posicion Ubicada: <?php echo $listar['resultado']; ?></div>
                                          </li>
                                        </ul>
                                      </div>
                                   <?php } ?>
                                </div>

                              <?php }else{ ?>
                                 <div class="col-md-6">
                                      <form id="frmPruebas" novalidate="novalidate">
                                        <div class="row">
                       										<div class="col-md-12">
                       											<div class="form-group">
                       												<label><b>PREGUNTA <?php echo $cont; ?> :</b></label><br>
                                              <label><h5><?php echo $listar['pregunta']; ?></h5></label>
                                  					</div>
                       										</div>
                       									</div>

                                      <?php if($listar['fktipo'] == "2" || $listar['fktipo'] == "3"){ ?>
                                       <div class="form-group">
                                         <label><b>Portada :</b></label>
                                         <div class="input-group">
                                           <div class="product-img">
                                               <img src="<?php if($listar["imagen"] != "" && $listar["imagen"] != "null"){ echo "pages/preguntas/upload/".$listar["imagen"];}else{ echo "vendors/images/photo1.png";} ?>"  id="image" style="height: 170px;" alt="Product Image">
                                           </div>
                                         </div>
                                       </div>

                                       <div class="row">
                                         <div class="col-md-12">
                                           <div class="form-group" style="width: 200px;margin: 0 auto;">
                                             <div class="row" style="display:none;">
                                                 <div class="product-img" style="margin-left:30%;">
                                                   <img src="src/images/logo.jpg" alt="Product Image" style="height: 100px;" id="image">
                                                 </div>
                                             </div>
                                             <div class="row">
                                               <div style="display:none;">
                                                 <input type="file" id="files">
                                               </div>
                                               <div class="col-md-12" style="display:none;">
                                                 <div class="form-group">
                                                     <label>Imagen:</label>
                                                     <div class="input-group date">
                                                       <input type="text" class="form-control pull-right input-sm" id="inputNArchivo" name="inputNArchivo">
                                                     </div>
                                                 </div>
                                               </div>
                                             </div>
                                           </div>
                                           <br>
                                           <div class="row">
                                              <div class="upload-msg"></div>
                                           </div>
                                        </div>
                                       </div>
                                     <?php } ?>
                                    </form>
                                  </div>




                                  <div class="col-md-6" style="margin-bottom:30px;">
                                    <?php
                                      if($listar['resultado'] == ""){
                                        $resultad = $obj_cnsc->ConsultarDetailsOpciones($listar['ID']);
                                         if(mysqli_num_rows($resultad)>0){
                                           $conta = 0;
                                              while ($listar_r = mysqli_fetch_assoc($resultad)) {
                                               $conta++;
                                          ?>
                                          <div class="row seleccion" atrib0="<?php echo $listares['id']; ?>" atrib1="<?php echo $_POST['id'];?>"  atrib2="<?php echo $listar_r['fkpregunta'];?>"  atrib3="<?php echo $listar_r['opcion'];?>">
                															<div class="col-md-6">
                																 <img src="pages/preguntas/upload/<?php echo $listar_r['imagen']; ?>" alt="" style="width: 180px;">
                															 </div>
                															 <div class="col-md-6" style="text-align: end;">
                																 <span class="badge badge-pill badge-danger"></span>
                                      				 </div>
                													 </div>
                                         <?php
                                             }
                                           }
                                         }else{
                                         ?>
                                         <div class="browser-visits">
                             								<ul>
                                              <?php if($listar['resultado'] == "Correcta"){ ?>
                             									<li class="d-flex flex-wrap align-items-center">
                             										<div class="browser-name badge badge-pill badge-success">Respuesta <?php echo $listar['resultado']; ?></div>
                             									</li>
                                            <?php }else{ ?>
                                              <li class="d-flex flex-wrap align-items-center">
                                                <div class="browser-name badge badge-pill badge-danger">Respuesta <?php echo $listar['resultado']; ?></div>
                                              </li>
                                            <?php } ?>
                             								</ul>
                             							</div>
                                       <?php } ?>
                                   </div>
                              <?php
                                 }
                               }
                             }else{
                              ?>
                              <tr>
                                  <td colspan="9" style="text-align:center;">No se encontraron registros</td>
                              </tr>
                          <?php
                            }
                          ?>
                		</div>
 						   	</div>
					  	</div>
					</div>
				</div>

      <script type="text/javascript">
          $(".winston").draggable();
          $(".dropzone").droppable({
              drop: function(event, ui) {
                  $(this).css('background', 'Lightgreen');
                  var a = $(".dragg").attr('atrib0');
                  var b = $(".dragg").attr('atrib1');
                  var c = $(".dragg").attr('atrib2');
                  var d = $(".dragg").attr('atrib3');
                  var parametros = {
                      "valor0" : a,
                      "valor1" : b,
                      "valor2" : c,
                      "valor3" : d
                  };
                  $.ajax({
                     url : 'pages/pruebaEst/seleccion.php',
                     data:  parametros,
                     type: "post",
                     success: function(response) {
                         funcionajax("pages/pruebaEst/prueba.php","container",<?php echo $_POST['id']; ?>);
                     },
                     error: function(xhr, status) {
                         funcionajax("pages/pruebaEst/prueba.php","container",<?php echo $_POST['id']; ?>);
                     },
                     complete: function(xhr, status) {
                     }
                  });
              },
              over: function(event, ui) {
                  $(this).css('background', 'orange');
              },
              out: function(event, ui) {
                  $(this).css('background', 'cyan');
              }
          });

        $(".seleccion").click(function(){
          var a = $(this).attr('atrib0');
          var b = $(this).attr('atrib1');
          var c = $(this).attr('atrib2');
          var d = $(this).attr('atrib3');
          var parametros = {
              "valor0" : a,
              "valor1" : b,
              "valor2" : c,
              "valor3" : d
          };
          $.ajax({
             url : 'pages/pruebaEst/seleccion.php',
             data:  parametros,
             type: "post",
             success: function(response) {
                 funcionajax("pages/pruebaEst/prueba.php","container",<?php echo $_POST['id']; ?>);
             },
             error: function(xhr, status) {
                 funcionajax("pages/pruebaEst/prueba.php","container",<?php echo $_POST['id']; ?>);
             },
             complete: function(xhr, status) {
             }
          });
        });
      </script>

				<div class="footer-wrap pd-20 mb-20 card-box">
					DeskApp - Bootstrap 4 Admin Template By
					<a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
				</div>
			</div>
