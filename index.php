<?php
  session_start();
  header("Cache-Control: no-store, no-cache, must-revalidate");
	if (!isset($_SESSION['username'])){
			header("location: login.php");
	}

  require "class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  $enero = $obj_cnsc->CantidadMesPedidos(1);
  $ene = mysqli_fetch_assoc($enero);

  $febrero = $obj_cnsc->CantidadMesPedidos(2);
  $feb = mysqli_fetch_assoc($febrero);

  $marzo = $obj_cnsc->CantidadMesPedidos(3);
  $mar = mysqli_fetch_assoc($marzo);

  $abril = $obj_cnsc->CantidadMesPedidos(4);
  $abr = mysqli_fetch_assoc($abril);

  $mayo = $obj_cnsc->CantidadMesPedidos(5);
  $may = mysqli_fetch_assoc($mayo);

  $junio = $obj_cnsc->CantidadMesPedidos(6);
  $jun = mysqli_fetch_assoc($junio);

  $julio = $obj_cnsc->CantidadMesPedidos(7);
  $jul = mysqli_fetch_assoc($julio);

  $agosto = $obj_cnsc->CantidadMesPedidos(8);
  $ago = mysqli_fetch_assoc($agosto);

  $septiembre = $obj_cnsc->CantidadMesPedidos(9);
  $sep = mysqli_fetch_assoc($septiembre);

  $octubre = $obj_cnsc->CantidadMesPedidos(10);
  $oct = mysqli_fetch_assoc($octubre);

  $noviembre = $obj_cnsc->CantidadMesPedidos(11);
  $nov = mysqli_fetch_assoc($noviembre);

  $diciembre = $obj_cnsc->CantidadMesPedidos(12);
  $dic = mysqli_fetch_assoc($diciembre);
 ?>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
    <title>Asaditas Gourmet</title>
  	<!-- Site favicon -->
  	<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="vendors/images/apple-touch-icon.png"
		/>

    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="vendors/images/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="vendors/images/apple-touch-icon.png">

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/responsive.bootstrap4.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">


	</head>
	<body>
		<div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="vendors/images/ic_logo.jpg" alt="" />
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Cargando...</div>
			</div>
		</div>

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input"
								placeholder="Buscar por"
							/>

						</div>
					</form>
				</div>
			</div>
			<div class="header-right">

				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown">
							<span class="user-icon">
								<img src="vendors/images/photo1.png" alt="" />
							</span>
							<span class="user-name"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
							<a class="dropdown-item" href="javascript:void(0);" id="salir2">
								<i class="dw dw-logout"></i> Salir
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
					<div class="sidebar-radio-group pb-10 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-1"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebaricon-1"
								><i class="fa fa-angle-down"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-2"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-2"
							/>
							<label class="custom-control-label" for="sidebaricon-2"
								><i class="ion-plus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-3"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-3"
							/>
							<label class="custom-control-label" for="sidebaricon-3"
								><i class="fa fa-angle-double-right"></i
							></label>
						</div>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
					<div class="sidebar-radio-group pb-30 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-1"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-1"
								><i class="ion-minus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-2"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-2"
							/>
							<label class="custom-control-label" for="sidebariconlist-2"
								><i class="fa fa-circle-o" aria-hidden="true"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-3"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-3"
							/>
							<label class="custom-control-label" for="sidebariconlist-3"
								><i class="dw dw-check"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-4"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-4"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-4"
								><i class="icon-copy dw dw-next-2"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-5"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-5"
							/>
							<label class="custom-control-label" for="sidebariconlist-5"
								><i class="dw dw-fast-forward-1"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-6"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-6"
							/>
							<label class="custom-control-label" for="sidebariconlist-6"
								><i class="dw dw-next"></i
							></label>
						</div>
					</div>

					<div class="reset-options pt-30 text-center">
						<button class="btn btn-danger" id="reset-settings">
							Reset Settings
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="javascript:void(0);">
					<img src="vendors/images/icono.png" alt="" class="dark-logo" style="height: 50px;margin-left: 60px;" />
          <img
            src="vendors/images/icono2.png"
            alt=""
            class="light-logo"
          />
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li>
							<a href="javascript:void(0);" id="Resumen" class="dropdown-toggle no-arrow resumen">
								<span class="micon bi bi-calendar4-week"></span
								><span class="mtext">Resumen</span>
							</a>
						</li>
        <!--    <li>
              <a href="javascript:void(0);" id="Pos" class="dropdown-toggle no-arrow pos">
                <i class="micon fa-solid fa-calculator"></i>
                <span class="mtext">Pos</span>
              </a>
            </li>-->
      			<li>
							<a href="javascript:void(0);" id="Categoria" class="dropdown-toggle no-arrow categoria">
					      <i class="micon fa-solid fa-boxes-stacked"></i>
                <span class="mtext">Categoria</span>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);" id="Platos" class="dropdown-toggle no-arrow platos">
                <i class="micon fa-solid fa-pot-food"></i>
                <span class="mtext">Plato</span>
							</a>
						</li>
	        <li>
            <a href="javascript:void(0);" id="Pedidos" class="dropdown-toggle no-arrow pedidos">
              <i class="micon fa-solid fa-moped"></i>
              <span class="mtext">Pedido</span>
            </a>
          </li>
    				<li>
							<a href="javascript:void(0);" id="Clientes" class="dropdown-toggle no-arrow clientes">
                <i class="micon fa-regular fa-users"></i>
                <span class="mtext">Clientes</span>
							</a>
						</li>
<!--"
     				<li>
 							<a href="javascript:void(0);" id="Sucursal" class="dropdown-toggle no-arrow sucursal">
 					       <i class="micon fa-solid fa-shop"></i>
                 <span class="mtext">Sucursal</span>
 							</a>
 						</li>-->
            <li>
              <a href="javascript:void(0);" id="Domiciliario" class="dropdown-toggle no-arrow domiciliario">
                 <i class="micon fa fa-motorcycle" aria-hidden="true"></i>
                <span class="mtext">Domiciliario</span>
              </a>
            </li>

							<li>
								<a href="javascript:void(0);" id="Administrador" class="dropdown-toggle no-arrow administrador">
                  <span class='micon bi bi-person-badge'></span>
          				<span class="mtext">Administrador</span>
								</a>
							</li>
						<li>
							<div class="dropdown-divider"></div>
						</li>

            <li>
              <a href="javascript:void(0);" id="Configuracion" class="dropdown-toggle no-arrow configuracion">
               <i class="micon fa fa-cogs" aria-hidden="true"></i>
                <span class="mtext">Configuración</span>
              </a>
            </li>

						<li>
							<a href="javascript:void(0);" id="salir" class="dropdown-toggle no-arrow salir">
                <i class="micon dw dw-logout"></i>
								<span class="mtext">
									Cerrar Sesiòn
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>
		<div class="main-container" id="container">
		</div>
	</div>
  <script src="vendors/scripts/core.js"></script>
  <script src="vendors/scripts/script.min.js"></script>
  <script src="vendors/scripts/process.js"></script>
  <script src="vendors/scripts/layout-settings.js"></script>
  <script src="src/plugins/apexcharts/apexcharts.min.js"></script>
  <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
  <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
  <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
  <!--<script src="vendors/scripts/dashboard.js"></script>-->
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
	<script src="vendors/scripts/Ajax.js"></script>
	<script src="vendors/scripts/funcionesAjax.js"></script>
	<link rel="stylesheet" href="vendors/styles/sweetalert.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	<script src="vendors/scripts/sweetalert-dev.js"></script>
	<script src="vendors/scripts/jquery-validation-1.14.0/dist/jquery.validate.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript">
      funcionajax('pages/Home/index.php','container','');
      $('.dropdown-toggle').removeClass('active');
 	  	$('.resumen').addClass('active');

      var options5 = {
      	chart: {
      		height: 350,
      		type: 'bar',
      		parentHeightOffset: 0,
      		fontFamily: 'Poppins, sans-serif',
      		toolbar: {
      			show: false,
      		},
      	},
      	colors: ['#ff4d59', '#f56767'],
      	grid: {
      		borderColor: '#c7d2dd',
      		strokeDashArray: 5,
      	},
      	plotOptions: {
      		bar: {
      			horizontal: false,
      			columnWidth: '15%',
      			endingShape: 'rounded'
      		},
      	},
      	dataLabels: {
      		enabled: false
      	},
      	stroke: {
      		show: true,
      		width: 1,
      		colors: ['transparent']
      	},
      	series: [{
      		name: 'In Progress',
      		data: [
          <?php echo $ene['id']; ?>,
          <?php echo $feb['id']; ?>,
          <?php echo $mar['id']; ?>,
          <?php echo $abr['id']; ?>,
          <?php echo $may['id']; ?>,
          <?php echo $jun['id']; ?>,
          <?php echo $jul['id']; ?>,
          <?php echo $ago['id']; ?>,
          <?php echo $sep['id']; ?>,
          <?php echo $oct['id']; ?>,
          <?php echo $nov['id']; ?>,
          <?php echo $dic['id'];  ?>
         ]
      	}],
      	xaxis: {
      		categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
      		labels: {
      			style: {
      				colors: ['#ff4d59'],
      				fontSize: '16px',
      			},
      		},
      		axisBorder: {
      			color: '#8fa6bc',
      		}
      	},
      	yaxis: {
      		title: {
      			text: ''
      		},
      		labels: {
      			style: {
      				colors: '#353535',
      				fontSize: '16px',
      			},
      		},
      		axisBorder: {
      			color: '#f00',
      		}
      	},
      	legend: {
      		horizontalAlign: 'right',
      		position: 'top',
      		fontSize: '16px',
      		offsetY: 0,
      		labels: {
      			colors: '#353535',
      		},
      		markers: {
      			width: 5,
      			height: 10,
      			radius: 15,
      		},
      		itemMargin: {
      			vertical: 0
      		},
      	},
      	fill: {
      		opacity: 1

      	},
      	tooltip: {
      		style: {
      			fontSize: '15px',
      			fontFamily: 'Poppins, sans-serif',
      		},
      		y: {
      			formatter: function (val) {
      				return val
      			}
      		}
      	}
      }

      var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
      chart5.render();


      $("#Resumen").click(function(){
				$('.dropdown-toggle').removeClass('active');
				  $('.resumen').addClass('active');
			 funcionajax("pages/Home/index.php","container","");
		 });
		 $("#Categoria").click(function(){
			 $('.dropdown-toggle').removeClass('active');
				 $('.categoria').addClass('active');
			funcionajax("pages/categoria/index.php","container","");
	 	});
/*
    $("#Pos").click(function(){
      $('.dropdown-toggle').removeClass('active');
        $('.pos').addClass('active');
     funcionajax("pages/Pos/index.php","container","");
   });
   */
			$("#Platos").click(function(){
				$('.dropdown-toggle').removeClass('active');
				$('.platos').addClass('active');
			 funcionajax("pages/platos/index.php","container","");
		 });
		 $("#Pedidos").click(function(){
			 $('.dropdown-toggle').removeClass('active');
			 $('.pedidos').addClass('active');
			funcionajax("pages/pedidos/index.php","container","");
		});
		 $("#Clientes").click(function(){
			 $('.dropdown-toggle').removeClass('active');
			 $('.clientes').addClass('active');
			 funcionajax("pages/clientes/index.php","container","");
		 });
/*
		 $("#Sucursal").click(function(){
			 $('.dropdown-toggle').removeClass('active');
			 $('.sucursal').addClass('active');
			 funcionajax("pages/sucursal/index.php","container","");
		});
    */
    $("#Administrador").click(function(){
      $('.dropdown-toggle').removeClass('active');
      $('.administrador').addClass('active');
      funcionajax("pages/administrador/index.php","container","");
   });

   $("#Domiciliario").click(function(){
     $('.dropdown-toggle').removeClass('active');
     $('.domiciliario').addClass('active');
     funcionajax("pages/domiciliario/index.php","container","");
  });



      $("#Configuracion").click(function(){
        $('.dropdown-toggle').removeClass('active');
        $('.configuracion').addClass('active');
        funcionajax("pages/configuracion/index.php","container","");
     });

			$("#salir").click(function(){
				swal({
						 title: "Cerrar Sesion",
						 text: "Realmente deseas salir de la sesion actual ?",
						 type: "warning",
						 showCancelButton: true,
						 confirmButtonColor: "#ff4d59",
						 confirmButtonText: "Aceptar",
						 cancelButtonText: "Cancelar",
						 closeOnConfirm: false,
						 closeOnCancel: false
						},
						function(isConfirm){
						 if (isConfirm) {
							 $.ajax({
									 url:'pages/usuarios/logout.php',
									 type:'post',
									 success:function(response){
										 window.location="login.php";
									 }
							 });
						 } else {
						  	swal.close();
						 }
					});
			});
			$("#salir2").click(function(){
				swal({
						 title: "Cerrar Sesion",
						 text: "Realmente deseas salir de la sesion actual ?",
						 type: "warning",
						 showCancelButton: true,
						 confirmButtonColor: "#ff4d59",
						 confirmButtonText: "Aceptar",
						 cancelButtonText: "Cancelar",
						 closeOnConfirm: false,
						 closeOnCancel: false
						},
						function(isConfirm){
						 if (isConfirm) {
							 $.ajax({
									 url:'pages/usuarios/logout.php',
									 type:'post',
									 success:function(response){
										 window.location="login.php";
									 }
							 });
						 } else {
						  	swal.close();
						 }
						});
			});
	  </script>
	</body>
</html>
