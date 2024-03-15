<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  require "../../class/db/clsController.php";
  session_start();
  $obj_mantenimiento = new clsCnsc();
  $resultado = $obj_mantenimiento->ConsultarUserIdPerfil($_SESSION['id']);
  $listar = mysqli_fetch_assoc($resultado);
?>

<div class="xs-pd-20-10 pd-ltr-20">
  <div class="title pb-20">
    <h2 class="h3 mb-0">Perfil</h2>
  </div>
    <div class="pd-ltr-20 xs-pd-20-10">
  				<div class="min-height-200px">
  					<div class="row">
  						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
  							<div class="pd-20 card-box height-100-p">
  								<div class="profile-photo">
  									<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
  									<img src="vendors/images/photo1.png" alt="" class="avatar-photo">
  									<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  										<div class="modal-dialog modal-dialog-centered" role="document">
  											<div class="modal-content">
  												<div class="modal-body pd-5">
  													<div class="img-container">
  														<img id="image" src="vendors/images/photo2.png" alt="Picture">
  													</div>
  												</div>
  												<div class="modal-footer">
  													<input type="submit" value="Update" class="btn btn-primary">
  													<button type="button" class="btn btn-default" data-dismiss="modal">
  														Close
  													</button>
  												</div>
  											</div>
  										</div>
  									</div>
  								</div>
  								<h5 class="text-center h5 mb-0"><?php echo $listar['nombre'].' '.$listar['apellido']; ?></h5>
  								<div class="profile-info">
  									<h5 class="mb-20 h5 text-blue" style="text-align:center;">Información de Contacto</h5>
  									<ul>
                      <?php if(isset($listar['identificacion'])){ ?>
  										<li>
  											<span>Identificacion</span>
  											<?php echo $listar['identificacion']; ?>
  										</li>
                      <?php } ?>
                      <?php if(isset($listar['correo'])){ ?>
  										<li>
  											<span>Correo Electronico</span>
                       <?php echo $listar['correo']; ?>
  										</li>
                      <?php } ?>
                      <?php if(isset($listar['telefono'])){ ?>
                  		<li>
  											<span>Telefono:</span>
                        <?php echo $listar['telefono']; ?>
  										</li>
                    <?php } ?>
  									</ul>
  								</div>

  							</div>
  						</div>
  						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
  							<div class="card-box height-100-p overflow-hidden">
  								<div class="profile-tab height-100-p">
  									<div class="tab height-100-p">

  										<div class="tab-content">
  											<!-- Tasks Tab End -->
  											<!-- Setting Tab start -->
                        <div class="tab-pane fade show active" id="timeline" role="tabpanel">
  												<div class="profile-setting">
  													<form>
  														<ul class="profile-edit-list row">
  															<li class="weight-500 col-md-6">
  																<h4 class="text-blue h5 mb-20">
  																	Mi Perfil
  																</h4>
  																<div class="form-group">
  																	<label>Full Name</label>
  																	<input class="form-control form-control-lg" type="text">
  																</div>
  																<div class="form-group">
  																	<label>Title</label>
  																	<input class="form-control form-control-lg" type="text">
  																</div>
  																<div class="form-group">
  																	<label>Email</label>
  																	<input class="form-control form-control-lg" type="email">
  																</div>
  																<div class="form-group">
  																	<label>Date of birth</label>
  																	<input class="form-control form-control-lg date-picker" type="text">
  																</div>
  																<div class="form-group">
  																	<label>Gender</label>
  																	<div class="d-flex">
  																		<div class="custom-control custom-radio mb-5 mr-20">
  																			<input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
  																			<label class="custom-control-label weight-400" for="customRadio4">Male</label>
  																		</div>
  																		<div class="custom-control custom-radio mb-5">
  																			<input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
  																			<label class="custom-control-label weight-400" for="customRadio5">Female</label>
  																		</div>
  																	</div>
  																</div>
  																<div class="form-group">
  																	<label>Country</label>
  																	<div class="dropdown bootstrap-select form-control form-control-lg"><select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen" tabindex="-98"><option class="bs-title-option" value=""></option>
  																		<option>United States</option>
  																		<option>India</option>
  																		<option>United Kingdom</option>
  																	</select><button type="button" class="btn dropdown-toggle btn-outline-secondary btn-lg bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-3" aria-haspopup="listbox" aria-expanded="false" title="Not Chosen"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Not Chosen</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-3" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
  																</div>
  																<div class="form-group">
  																	<label>State/Province/Region</label>
  																	<input class="form-control form-control-lg" type="text">
  																</div>
  																<div class="form-group">
  																	<label>Postal Code</label>
  																	<input class="form-control form-control-lg" type="text">
  																</div>
  																<div class="form-group">
  																	<label>Phone Number</label>
  																	<input class="form-control form-control-lg" type="text">
  																</div>
  																<div class="form-group">
  																	<label>Address</label>
  																	<textarea class="form-control"></textarea>
  																</div>
  																<div class="form-group">
  																	<label>Visa Card Number</label>
  																	<input class="form-control form-control-lg" type="text">
  																</div>
  																<div class="form-group">
  																	<label>Paypal ID</label>
  																	<input class="form-control form-control-lg" type="text">
  																</div>
  																<div class="form-group">
  																	<div class="custom-control custom-checkbox mb-5">
  																		<input type="checkbox" class="custom-control-input" id="customCheck1-1">
  																		<label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification
  																			emails</label>
  																	</div>
  																</div>
  																<div class="form-group mb-0">
  																	<input type="submit" class="btn btn-primary" value="Update Information">
  																</div>
  															</li>
  															<li class="weight-500 col-md-6">
  																<h4 class="text-blue h5 mb-20">
  																	<br>
  																</h4>
  																<div class="form-group">
  																	<label>Facebook URL:</label>
  																	<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
  																</div>
  																<div class="form-group">
  																	<label>Twitter URL:</label>
  																	<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
  																</div>
  																<div class="form-group">
  																	<label>Linkedin URL:</label>
  																	<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
  																</div>
  																<div class="form-group">
  																	<label>Instagram URL:</label>
  																	<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
  																</div>
  																<div class="form-group">
  																	<label>Dribbble URL:</label>
  																	<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
  																</div>
  																<div class="form-group">
  																	<label>Dropbox URL:</label>
  																	<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
  																</div>
  																<div class="form-group">
  																	<label>Google-plus URL:</label>
  																	<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
  																</div>
  																<div class="form-group">
  																	<label>Pinterest URL:</label>
  																	<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
  																</div>
  																<div class="form-group">
  																	<label>Skype URL:</label>
  																	<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
  																</div>
  																<div class="form-group">
  																	<label>Vine URL:</label>
  																	<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
  																</div>
  																<div class="form-group mb-0">
  																	<input type="submit" class="btn btn-primary" value="Save &amp; Update">
  																</div>
  															</li>
  														</ul>
  													</form>
  												</div>
  											</div>
  											<!-- Setting Tab End -->
  										</div>
  									</div>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>


</div>
