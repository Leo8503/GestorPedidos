
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Formulario Nuevo Domiciliario</h4>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>
      </div>
    </div>

			<div class="min-height-200px">
					<div class="pd-20 card-box mb-30">
						<div class="wizard-content">
							<form  id="FormAddDomiciliario" class="tab-wizard wizard-circle wizard clearfix" role="application">
                <div class="content clearfix">
								<h5 id="steps-uid-0-h-0" tabindex="-1" class="title current">Información de Domiciliario</h5>
                <br>
								<section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
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
										<div class="col-md-12">
											<div class="form-group">
												<label>Correo Electrónico :</label>
                        <input type="text" id="correo" name="correo" class="form-control">
                    	</div>
										</div>
									</div>



                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Numero Contacto :</label>
                        <input type="text" id="contavto" name="contacto" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tipo Vehiculo :</label>
                        <select id="tipo" name="tipo" class="custom-select form-control">
                          <option value="carro">Automovil</option>
                          <option value="moto">Motocicleta</option>
                          <option value="bicicleta">Bicicleta</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Estado :</label>
                        <select id="estado" name="estado" class="custom-select form-control">
                          <option value="activo">Activo</option>
                          <option value="inactivo">Inactivo</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Usuario:</label>
                        <input type="text" id="user" name="user"  class="form-control">
                       </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password:</label>
                        <input type="text" id="password" name="password"  class="form-control">
                       </div>
                    </div>
                  </div>

                  <div class="row" style="display:none;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Rol:</label>
                        <input type="text" value="Domiciliario" id="rol" name="rol"  class="form-control">
                       </div>
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
        $("#FormAddDomiciliario").validate({ debug: true,
          rules:{
            nombre:{required: true},
            apellido:{required: true},
            correo:{required: true},
            contacto:{required: true},
            tipo:{required: true},
            estado:{required: true}
          },
          messages:{
            nombre:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
            apellido:{required: "<span class='label label-danger'>Ingrese una subcategoria</span>"},
            correo:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
            contacto:{required: "<span class='label label-danger'>Ingrese una descripcion</span>"},
            tipo:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
            estado:{required: "<span class='label label-danger'>Ingrese una categoria</span>"}
          },
          submitHandler: function(form){
            guardarForm("pages/domiciliario/crearDomiciliario.php", "FormAddDomiciliario", function(resultado){
            if (resultado == "err:ok") {
                funcionajax("pages/domiciliario/index.php","container","");
              }
            });
            }
          });
      </script>
