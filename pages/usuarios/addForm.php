
<div class="pd-ltr-20 xs-pd-20-10">
  <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Formulario Nuevo Usuario</h4>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>
      </div>
    </div>

			<div class="min-height-200px">
					<div class="pd-20 card-box mb-30">
						<div class="wizard-content">

      				<form id="FormAddUsuario" class="tab-wizard wizard-circle wizard clearfix" role="application">
                <div class="content clearfix">
								<h5 id="steps-uid-0-h-0" tabindex="-1" class="title current">Información Personal</h5>
                <br>
								<section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Primer Nombre :</label>
												<input type="text" id="primer_nombre" name="primer_nombre" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Segundo Nombre :</label>
												<input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Dirección :</label>
												<input type="text" id="direccion" name="direccion" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Telefono :</label>
												<input type="text" id="telefono" name="telefono" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<!--<div class="col-md-6">
											<div class="form-group">
												<label>Rol :</label>
												<select id="rol" name="rol" class="custom-select form-control">
													<option value="Administrador">Administrador</option>
													<option value="Docente">Docente</option>
													<option value="Representante">Representante</option>
													<option value="Estudiante">Estudiante</option>
												</select>
											</div>
										</div>-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Fecha de Nacimiento :</label>
												<input type="text" id="fechaNac" name="fechaNac" class="form-control date-picker" readonly placeholder="00/00/00">
											</div>
										</div>
									</div>

                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Correo Electronico :</label>
                        <input type="email" id="email" name="email" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Contraseña :</label>
                        <input type="password" id="password" name="password" class="form-control">
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
					<!-- success Popup html End -->
				</div>
			</div>


<script type="text/javascript">
$( "#fechaNac").datepicker();

  $("#FormAddUsuario").validate({ debug: true,
    rules:{
      primer_nombre:{required: true},
      segundo_nombre:{required: true},
      direccion:{required: true},
      telefono:{required: true},
      fechaNac:{required: true},
      email:{required: true},
      password:{required: true}
    },
    messages:{
      primer_nombre:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
      segundo_nombre:{required: "<span class='label label-danger'>Ingrese una subcategoria</span>"},
      direccion:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
      telefono:{required: "<span class='label label-danger'>Ingrese una descripcion</span>"},
      fechaNac:{required: "<span class='label label-danger'>Ingrese una subcategoria</span>"},
      email:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
      password:{required: "<span class='label label-danger'>Ingrese una subcategoria</span>"}
    },
    submitHandler: function(form){
      guardarForm("pages/usuarios/crearUsuario.php", "FormAddUsuario", function(resultado){
      if (resultado == "err:ok") {
          funcionajax("pages/usuarios/index.php","container","");
          //upload_image();
          //$('#editar-modal').modal('hide');
          //funcionajax("pages/producto/content_productos.php","content","");
          //swal("Registro Exitoso!", "Producto registrado con exito!", "success");
        }
      });
      }
    });
</script>
