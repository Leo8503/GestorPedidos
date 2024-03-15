<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  require "../../class/db/clsController.php";
  $obj_mantenimiento = new clsCnsc();
  $resultado = $obj_mantenimiento->ConsultarIdSucursal($_POST['id']);
  $listar = mysqli_fetch_assoc($resultado);
 ?>
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Formulario Editar Sucursal</h4>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>
      </div>
    </div>

			<div class="min-height-200px">
					<div class="pd-20 card-box mb-30">
						<div class="wizard-content">
              <form class="tab-wizard wizard-circle wizard clearfix" role="application" id="FormAddSucursal">
                <div class="content clearfix">
                <br>
                <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                  <div class="form-group">
                    <label>Foto:</label>
                    <div class="input-group">
                      <div style=" position: relative;width: 50px;height: 160px;line-height: 30px;text-align: center;background: #142127;color: #fff;padding-top: 68px;" class="input-group-addon" id="imagen" >
                          <i class="fa fa-image"></i>
                          <input type="file" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;" type="file" name="files" id="files" />
                      </div>
                      <div class="product-img">
                        <img src="<?php if($listar["foto"] != "" && $listar["foto"] != "null"){ echo "pages/sucursal/upload/".$listar["foto"];}else{ echo "images/default-50x50.gif";} ?>"    id="image" style="/* width: 100px; */height: 160px;" alt="Product Image">
                      </div>
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


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="form-control">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Latitud</label>
                        <input id="latitud" name="latitud" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Longitud</label>
                        <input id="longitud" name="longitud" type="text" class="form-control">
                      </div>
                    </div>
                  </div>



                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Telefono</label>
                        <input id="telefono" name="telefono" type="text" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Direccion</label>
                        <input id="direccion" name="direccion" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                </section>
              </div>

              <div class="btn-list" style="text-align: center;">
                <button type="submit"  class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
                  <i class="fas fa-save"></i> Guardar
                </button>
              </div>
            </form>

						</div>
					</div>
				</div>
			</div>

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
        });

        function upload_image(){
          $(".upload-msg").text('Cargando...');
          var inputFileImage = document.getElementById("files");
          var file = inputFileImage.files[0];
          var data = new FormData();
          data.append('files',file);
          $.ajax({
            url: "pages/sucursal/upload.php",        // Url to which the request is send
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


        $("#FormAddSucursal").validate({ debug: true,
          rules:{
            nombre:{required: true},
            latitud:{required: true},
            longitud:{required: true},
            telefono:{required: true},
            direccion:{required: true}
          },
          messages:{
            nombre:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
            latitud:{required: "<span class='label label-danger'>Ingrese una subcategoria</span>"},
            longitud:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
            telefono:{required: "<span class='label label-danger'>Ingrese una descripcion</span>"},
            direccion:{required: "<span class='label label-danger'>Ingrese una categoria</span>"}
          },
          submitHandler: function(form){
              guardarForm("pages/sucursal/crearSucursal.php", "FormAddSucursal", function(resultado){
              if (resultado == "err:ok") {
                  upload_image();
                  funcionajax("pages/sucursal/index.php","container","");
                }
              });
            }
          });
      </script>
