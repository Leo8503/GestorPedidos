<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  require "../../class/db/clsController.php";
  $obj_mantenimiento = new clsCnsc();
  $resultado = $obj_mantenimiento->ConsultarConfig();
  $config = mysqli_fetch_assoc($resultado);
 ?>
<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Configuración</h4>
								<!--<p class="mb-30">All bootstrap element classies</p>-->
							</div>
						</div>

				<form  id="FormConfiguracion">
						<div class="col-md-12">
							<label>Logo:</label>
        		</div>
						<div class="row">
							<div class="col-md-12">
								<div class="input-group">
									<div style=" position: relative;width: 50px;height: 160px;line-height: 30px;text-align: center;background: #142127;color: #fff;padding-top: 68px;" class="input-group-addon" id="imagen" >
											<i class="fa fa-image"></i>
											<input type="file" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;" type="file" name="files" id="files" />
									</div>
									<div class="product-img">
							      <img src="<?php if($config["logo"] != "" && $config["logo"] != "null"){ echo "pages/configuracion/upload/".$config["logo"];}else{ echo "src/images/logo.jpg";} ?>"    id="image" style="height: 160px;" alt="Product Image">
        					</div>
								</div>
								<div class="row">
										<div class="col-md-12">
											<div class="form-group" style="width: 200px;margin: 0 auto;">
												<div class="row" style="display:none;">
														<div class="product-img" style="margin-left:30%;">
															<img src="dist/img/default-50x50.gif" alt="Product Image" style="height: 100px;" id="image">
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
							</div>
						</div>

						<div class="col-md-12">
							<label>Imagen de Presentacion App:</label>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="input-group">
									<div style=" position: relative;width: 50px;height: 160px;line-height: 30px;text-align: center;background: #142127;color: #fff;padding-top: 68px;" class="input-group-addon" id="imagen" >
											<i class="fa fa-image"></i>
											<input type="file" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;" type="file" name="files1" id="files1" />
									</div>
									<div class="product-img">
                    <img src="<?php if($config["imgApp"] != "" && $config["imgApp"] != "null"){ echo "pages/configuracion/upload/".$config["imgApp"];}else{ echo "src/images/logo.jpg";} ?>"    id="image1" style="height: 160px;" alt="Product Image">
              		</div>
								</div>
								<div class="row">
										<div class="col-md-12">
											<div class="form-group" style="width: 200px;margin: 0 auto;">
												<div class="row" style="display:none;">
														<div class="product-img" style="margin-left:30%;">
															<img src="dist/img/default-50x50.gif" alt="Product Image" style="height: 100px;" id="image1">
														</div>
												</div>
												<div class="row">
													<div style="display:none;">
														<input type="file" id="files1">
													</div>
													<div class="col-md-12" style="display:none;">
														<div class="form-group">
																<label>Imagen:</label>
																<div class="input-group date">
																	<input type="text" class="form-control pull-right input-sm" id="inputNArchivo1" name="inputNArchivo1">
																</div>
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												 <div class="upload-msg1"></div>
											</div>
									</div>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label>Tipo de Negocio</label>
							<select class="form-control" id="tipo" name="tipo">
								<option value="restaurante">Restaurante</option>
								<option value="comidas rapidas">Comidas Rapidas</option>
							</select>
						</div>

						<div class="form-group">
							<label>Nombre del Negocio</label>
							<input  id="nombre" name="nombre" class="form-control" type="text" placeholder="">
						</div>

							<div class="form-group">
								<label>Direccion</label>
								<input class="form-control"  id="direccion" name="direccion" type="text" placeholder="Johnny Brown">
							</div>
							<div class="form-group">
								<label>Correo Electronico</label>
								<input class="form-control"  id="correo" name="correo" value="bootstrap@example.com" type="email">
							</div>
							<div class="form-group">
								<label>Telefono</label>
								<input class="form-control"  id="telefono" name="telefono"  type="text">
							</div>
							<div class="form-group">
								<label>Ubicacion</label>
								<input class="form-control"  id="latitud" name="latitud" placeholder="Latitud" type="text">
								<br>
								<input class="form-control"  id="longitud" name="longitud"  placeholder="Longitud" type="text">
							</div>
							<div class="form-group">
								<label>Telefono de Soporte</label>
								<input class="form-control"  id="soporte" name="soporte"  type="text">
							</div>

							<div class="form-group">
								<label>Color de la App</label>
                 <input class="form-control"  id="color" name="color" value="#ff4d59" type="color">
							</div>

							<div class="col-md-12">
								<label>Banner Slider:</label>
	        		</div>
							<div class="row">
								<div class="col-md-4">
									<div class="input-group">
										<div style=" position: relative;width: 50px;height: 160px;line-height: 30px;text-align: center;background: #142127;color: #fff;padding-top: 68px;" class="input-group-addon" id="imagen2" >
												<i class="fa fa-image"></i>
												<input type="file" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;" type="file" name="files2" id="files2" />
										</div>
										<div class="product-img">
								      <img src="<?php if($config["banner1"] != "" && $config["banner1"] != "null"){ echo "pages/configuracion/upload/".$config["banner1"];}else{ echo "src/images/logo.jpg";} ?>"    id="image2" style="height: 160px;" alt="Product Image">
            				</div>
									</div>
									<div class="row">
											<div class="col-md-12">
												<div class="form-group" style="width: 200px;margin: 0 auto;">
													<div class="row" style="display:none;">
															<div class="product-img" style="margin-left:30%;">
																<img src="dist/img/default-50x50.gif" alt="Product Image" style="height: 100px;" id="image2">
															</div>
													</div>
													<div class="row">
														<div style="display:none;">
															<input type="file" id="files2">
														</div>
														<div class="col-md-12" style="display:none;">
															<div class="form-group">
																	<label>Imagen:</label>
																	<div class="input-group date">
																		<input type="text" class="form-control pull-right input-sm" id="inputNArchivo2" name="inputNArchivo2">
																	</div>
															</div>
														</div>
													</div>
												</div>
												<br>
												<div class="row">
													 <div class="upload-msg2"></div>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<div style=" position: relative;width: 50px;height: 160px;line-height: 30px;text-align: center;background: #142127;color: #fff;padding-top: 68px;" class="input-group-addon" id="imagen3" >
												<i class="fa fa-image"></i>
												<input type="file" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;" type="file" name="files3" id="files3" />
										</div>
										<div class="product-img">
								      <img src="<?php if($config["banner2"] != "" && $config["banner2"] != "null"){ echo "pages/configuracion/upload/".$config["banner2"];}else{ echo "src/images/logo.jpg";} ?>"    id="image3" style="height: 160px;" alt="Product Image">
              			</div>
									</div>
									<div class="row">
											<div class="col-md-12">
												<div class="form-group" style="width: 200px;margin: 0 auto;">
													<div class="row" style="display:none;">
															<div class="product-img" style="margin-left:30%;">
																<img src="dist/img/default-50x50.gif" alt="Product Image" style="height: 100px;" id="image3">
															</div>
													</div>
													<div class="row">
														<div style="display:none;">
															<input type="file" id="files3">
														</div>
														<div class="col-md-12" style="display:none;">
															<div class="form-group">
																	<label>Imagen:</label>
																	<div class="input-group date">
																		<input type="text" class="form-control pull-right input-sm" id="inputNArchivo3" name="inputNArchivo3">
																	</div>
															</div>
														</div>
													</div>
												</div>
												<br>
												<div class="row">
													 <div class="upload-msg3"></div>
												</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<div style=" position: relative;width: 50px;height: 160px;line-height: 30px;text-align: center;background: #142127;color: #fff;padding-top: 68px;" class="input-group-addon" id="imagen4" >
												<i class="fa fa-image"></i>
												<input type="file" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;" type="file" name="files4" id="files4" />
										</div>
										<div class="product-img">
                      <img src="<?php if($config["banner3"] != "" && $config["banner3"] != "null"){ echo "pages/configuracion/upload/".$config["banner3"];}else{ echo "src/images/logo.jpg";} ?>"    id="image4" style="height: 160px;" alt="Product Image">
            				</div>
									</div>
									<div class="row">
											<div class="col-md-12">
												<div class="form-group" style="width: 200px;margin: 0 auto;">
													<div class="row" style="display:none;">
															<div class="product-img" style="margin-left:30%;">
																<img src="dist/img/default-50x50.gif" alt="Product Image" style="height: 100px;" id="image4">
															</div>
													</div>
													<div class="row">
														<div style="display:none;">
															<input type="file" id="files4">
														</div>
														<div class="col-md-12" style="display:none;">
															<div class="form-group">
																	<label>Imagen:</label>
																	<div class="input-group date">
																		<input type="text" class="form-control pull-right input-sm" id="inputNArchivo4" name="inputNArchivo4">
																	</div>
															</div>
														</div>
													</div>
												</div>
												<br>
												<div class="row">
													 <div class="upload-msg4"></div>
												</div>
										</div>
									</div>
								</div>
							</div>

              <div class="form-group">
                <label></label>
                <div class="custom-file">
                  <div class="pull-center">
										<button type="submit"  class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
											<i class="fas fa-save"></i> Actualizar
										</button>
		              </div>
                </div>
              </div>
						</form>

						<script type="text/javascript">
								$(function (){
									document.getElementById("files").onchange = function () {
										var a = document.getElementById('files').files[0].name;
										document.getElementById("inputNArchivo").value = a;
										var reader = new FileReader();
										reader.onload = function (e) {
												document.getElementById("image").src = e.target.result;
										};
										reader.readAsDataURL(this.files[0]);
									};

									document.getElementById("files1").onchange = function () {
										var a = document.getElementById('files1').files[0].name;
										document.getElementById("inputNArchivo1").value = a;
										var reader = new FileReader();
										reader.onload = function (e) {
												document.getElementById("image1").src = e.target.result;
										};
										reader.readAsDataURL(this.files[0]);
									};

									document.getElementById("files2").onchange = function () {
										var a = document.getElementById('files2').files[0].name;
										document.getElementById("inputNArchivo2").value = a;
										var reader = new FileReader();
										reader.onload = function (e) {
												document.getElementById("image2").src = e.target.result;
										};
										reader.readAsDataURL(this.files[0]);
									};

									document.getElementById("files3").onchange = function () {
										var a = document.getElementById('files3').files[0].name;
										document.getElementById("inputNArchivo3").value = a;
										var reader = new FileReader();
										reader.onload = function (e) {
												document.getElementById("image3").src = e.target.result;
										};
										reader.readAsDataURL(this.files[0]);
									};

									document.getElementById("files4").onchange = function () {
										var a = document.getElementById('files4').files[0].name;
										document.getElementById("inputNArchivo4").value = a;
										var reader = new FileReader();
										reader.onload = function (e) {
												document.getElementById("image4").src = e.target.result;
										};
										reader.readAsDataURL(this.files[0]);
									};
								});

								function upload_image(){
									$(".upload-msg").text('Cargando...');
									var inputFileImage = document.getElementById("files");
									var file = inputFileImage.files[0];
									var data = new FormData();
									data.append('files',file);
									$.ajax({
										url: "pages/configuracion/upload.php",        // Url to which the request is send
										type: "POST",             // Type of request to be send, called as method
										data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
										contentType: false,       // The content type used when sending data to the server.
										cache: false,             // To unable request pages to be cached
										processData:false,        // To send DOMDocument or non processed data file it is set to false
										success: function(data)   // A function to be called if request succeeds
										{
											$(".upload-msg").html(data);
											window.setTimeout(function() {
											$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
											$(this).remove();
											});	}, 5000);
										}
									});
								}


								function upload_image1(){
									$(".upload-msg1").text('Cargando...');
									var inputFileImage = document.getElementById("files1");
									var file = inputFileImage.files[0];
									var data = new FormData();
									data.append('files',file);
									$.ajax({
										url: "pages/configuracion/upload.php",        // Url to which the request is send
										type: "POST",             // Type of request to be send, called as method
										data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
										contentType: false,       // The content type used when sending data to the server.
										cache: false,             // To unable request pages to be cached
										processData:false,        // To send DOMDocument or non processed data file it is set to false
										success: function(data)   // A function to be called if request succeeds
										{
											$(".upload-msg1").html(data);
											window.setTimeout(function() {
											$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
											$(this).remove();
											});	}, 5000);
										}
									});
								}



									function upload_image2(){
										$(".upload-msg2").text('Cargando...');
										var inputFileImage = document.getElementById("files2");
										var file = inputFileImage.files[0];
										var data = new FormData();
										data.append('files',file);
										$.ajax({
											url: "pages/configuracion/upload.php",        // Url to which the request is send
											type: "POST",             // Type of request to be send, called as method
											data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
											contentType: false,       // The content type used when sending data to the server.
											cache: false,             // To unable request pages to be cached
											processData:false,        // To send DOMDocument or non processed data file it is set to false
											success: function(data)   // A function to be called if request succeeds
											{
												$(".upload-msg2").html(data);
												window.setTimeout(function() {
												$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
												$(this).remove();
												});	}, 5000);
											}
										});
									}


								function upload_image3(){
									$(".upload-msg3").text('Cargando...');
									var inputFileImage = document.getElementById("files3");
									var file = inputFileImage.files[0];
									var data = new FormData();
									data.append('files',file);
									$.ajax({
										url: "pages/configuracion/upload.php",        // Url to which the request is send
										type: "POST",             // Type of request to be send, called as method
										data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
										contentType: false,       // The content type used when sending data to the server.
										cache: false,             // To unable request pages to be cached
										processData:false,        // To send DOMDocument or non processed data file it is set to false
										success: function(data)   // A function to be called if request succeeds
										{
											$(".upload-msg3").html(data);
											window.setTimeout(function() {
											$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
											$(this).remove();
											});	}, 5000);
										}
									});
								}

								function upload_image4(){
									$(".upload-msg4").text('Cargando...');
									var inputFileImage = document.getElementById("files4");
									var file = inputFileImage.files[0];
									var data = new FormData();
									data.append('files',file);
									$.ajax({
										url: "pages/configuracion/upload.php",        // Url to which the request is send
										type: "POST",             // Type of request to be send, called as method
										data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
										contentType: false,       // The content type used when sending data to the server.
										cache: false,             // To unable request pages to be cached
										processData:false,        // To send DOMDocument or non processed data file it is set to false
										success: function(data)   // A function to be called if request succeeds
										{
											$(".upload-msg4").html(data);
											window.setTimeout(function() {
											$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
											$(this).remove();
											});	}, 5000);
										}
									});
								}

								$("#FormConfiguracion").validate({ debug: true,
									rules:{
										tipo:{required: true},
										soporte:{required: true},
                    color:{required: true}
									},
									messages:{
										tipo:{required: "<span class='label label-danger'>Seleccione tipo negocio</span>"},
										soporte:{required: "<span class='label label-danger'>Ingrese un numero Whattsapp</span>"},
										color:{required: "<span class='label label-danger'>Seleccione un color</span>"}
									},
									submitHandler: function(form){
											guardarForm("pages/configuracion/ActualizarConfiracion.php", "FormConfiguracion", function(resultado){
											if (resultado == "err:ok") {
													upload_image();upload_image1();
													upload_image2();upload_image3();upload_image4();
													funcionajax("pages/configuracion/index.php","container","");
												}
											});
										}
									});
							</script>




					</div>
	  		</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					DeskApp - Bootstrap 4 Admin Template By
					<a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
				</div>
			</div>
