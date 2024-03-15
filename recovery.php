<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Asaditas Gourmet</title>
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="vendors/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center">
				<div class="brand-logo">
					<a href="javascript:void(0);">
						<img src="vendors/images/icono.png" alt="" style="width: 150px;" />
					</a>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="vendors/images/login-page-img.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Asaditas Gourmet</h2>
							</div>

							<form id="FormLogin">
								<div id="content2" style="display:none;" class="alert alert-danger" role="alert">
									Usuario o Contraseña no validos
								</div>
								<div class="input-group custom">
									<input type="text" id="usuario" name="usuario" class="form-control form-control-lg" placeholder="Correo Electrónico"/>
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<button type="submit" class="btn btn-primary btn-lg btn-block">Recuperar acceso</button>
										</div>
									</div>
								</div>
                <br>
								<div class="row">
									<div class="col-12">
										<div class="forgot-password" style="text-align: center;">
											<a href="login.php">Volver a inicio</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- welcome modal start -->
		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="vendors/scripts/Ajax.js"></script>
		<script src="vendors/scripts/funcionesAjax.js"></script>
		<script src="vendors/scripts/jquery-validation-1.14.0/dist/jquery.validate.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
    <script type="text/javascript">
		$("#FormLogin").validate({ debug: true,
				rules:{
					usuario:{required: true},
					password:{required: true}
				},
				messages:{
					usuario:{required: "<span class='label label-danger'>Ingrese Correo Electronico</span>"},
					password:{required: "<span class='label label-danger'>Ingrese Contraseña</span>"}
				},
				submitHandler: function(form){
					guardarForm("pages/usuarios/checkUser.php", "FormLogin", function(resultado){
					if (resultado == "err:ok") {
							window.location="index.php";
						}else{
						   if(resultado == ""){
								 window.location="login.php";
								 setTimeout(function() {
									   $("#content2").fadeIn(1500);
									},6000);
							 }
						}
					});
				 }
			});
    </script>
	</body>
</html>
