<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  require "../../class/db/clsController.php";
  $obj_mantenimiento = new clsCnsc();
  $resultado = $obj_mantenimiento->ConsultarIdDomiciliario($_POST['id']);
  $listar = mysqli_fetch_assoc($resultado);
?>

<div class="pd-ltr-20 xs-pd-20-10">
  <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Formulario Editar Domiciliario</h4>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>
      </div>
    </div>

			<div class="min-height-200px">
					<div class="pd-20 card-box mb-30">
						<div class="wizard-content">
							<form  id="FormEditApoderado" class="tab-wizard wizard-circle wizard clearfix" role="application">
                <div class="content clearfix">
								<h5 id="steps-uid-0-h-0" tabindex="-1" class="title current">Información de Domiciliario</h5>
                <br>
								<section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">

                  <div class="row" style="display:none;">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Id :</label>
                        <input value="<?php echo $_POST['id']; ?>" id="id" name="id" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>fkuser :</label>
                        <input value="<?php echo $listar['user']; ?>" id="iduser" name="iduser" type="text" class="form-control">
                      </div>
                    </div>
                  </div>





                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>ID :</label>
                        <input id="id" name="id" readonly value="<?php echo $listar['ID']; ?>" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
              		<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Nombre :</label>
												<input type="text" id="nombre" name="nombre" value="<?php echo $listar['nombre']; ?>" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Apellido :</label>
												<input type="text" id="apellido" name="apellido" value="<?php echo $listar['apellido']; ?>" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Correo Electrónico :</label>
                        <input type="text" id="correo" name="correo" value="<?php echo $listar['correo']; ?>" class="form-control">
                    	</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Telefono :</label>
												<input type="text" id="telefono" name="telefono" value="<?php echo $listar['telefono']; ?>"  class="form-control">
											</div>
										</div>
									</div>

                  <div class="row">
                    <div class="col-md-6" id="slcestudiante">

                    </div>
                    <div class="col-md-6" id="estasociados">

                    </div>
                  </div>

								</section>
							</div>

              <div class="btn-list" style="text-align: center;">
								<button type="submit"  class="btn btn-warning" data-toggle="button" aria-pressed="false" autocomplete="off">
									<i class="fas fa-save"></i> Editar
								</button>
							</div>
             </form>
						</div>
					</div>
					<!-- success Popup html End -->
				</div>
			</div>


      <script type="text/javascript">
      funcionajax("pages/apoderado/slcestudiante.php","slcestudiante",<?php echo $_POST['id']; ?>);
      funcionajax("pages/apoderado/responsables.php","estasociados",<?php echo $_POST['id']; ?>);

      $("#FormEditApoderado").validate({ debug: true,
        rules:{
          identificacion:{required: true},
          nombre:{required: true},
          apellido:{required: true},
          correo:{required: true},
          telefono:{required: true}
        },
        messages:{
          identificacion:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
          nombre:{required: "<span class='label label-danger'>Ingrese una subcategoria</span>"},
          apellido:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
          correo:{required: "<span class='label label-danger'>Ingrese una descripcion</span>"},
          telefono:{required: "<span class='label label-danger'>Ingrese una categoria</span>"}
        },
        submitHandler: function(form){
          guardarForm("pages/apoderado/editApoderado.php", "FormEditApoderado", function(resultado){
          if (resultado == "err:ok") {
              funcionajax("pages/apoderado/index.php","container","");
            }
          });
          }
        });
      </script>
