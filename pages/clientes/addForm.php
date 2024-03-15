
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Formulario Nuevo Cliente</h4>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>
      </div>
    </div>

			<div class="min-height-200px">
					<div class="pd-20 card-box mb-30">
						<div class="wizard-content">
							<form  id="FormAddApoderado" class="tab-wizard wizard-circle wizard clearfix" role="application">
                <div class="content clearfix">
								<h5 id="steps-uid-0-h-0" tabindex="-1" class="title current">Información del Representante</h5>
                <br>
								<section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>N° de Telefono :</label>
                        <input id="identificacion" name="identificacion" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
              		<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Nombre :</label>
												<input type="text" id="nombre" name="nombre" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Apellido :</label>
												<input type="text" id="apellido" name="apellido" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Correo Electrónico :</label>
                        <input type="text" id="correo" name="correo" class="form-control">
                    	</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Fecha de Nacimiento :</label>
												<input type="text" id="telefono" name="telefono" class="form-control">
											</div>
										</div>
									</div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Direccion Entrega:</label>
                        <textarea  id="categoria" name="categoria" name="name" rows="3" cols="20" class="form-control"></textarea>
                       </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Usuario:</label>
                        <input type="text" id="telefono" name="telefono" readonly class="form-control">
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
             <br><br>

              <div class="btn-list" style="text-align: center;">
								<button type="submit"  class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
									<i class="fas fa-save"></i> Guardar
								</button>
							</div>

             </form>
						</div>
					</div>
					<!-- success Popup html End -->
				</div>
			</div>


      <script type="text/javascript">
      funcionajax("pages/apoderado/slctempestudiante.php","slcestudiante","");
      funcionajax("pages/apoderado/estudianteasociados.php","estasociados","");

        $("#FormAddApoderado").validate({ debug: true,
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
            guardarForm("pages/apoderado/crearApoderado.php", "FormAddApoderado", function(resultado){
            if (resultado == "err:ok") {
                funcionajax("pages/apoderado/index.php","container","");
              }
            });
            }
          });
      </script>
