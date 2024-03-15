<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  require "../../class/db/clsController.php";

  $obj_mantenimiento = new clsCnsc();
  $resultado = $obj_mantenimiento->ConsultarIdPedido($_POST['id']);
  $listar = mysqli_fetch_assoc($resultado);
?>

<div class="pd-ltr-20 xs-pd-20-10">
  <div class="page-header">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="title">
            <h4>Formulario Editar Usuario</h4>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>
      </div>
    </div>

			<div class="min-height-200px">
					<div class="pd-20 card-box mb-30">
						<div class="wizard-content">
      				<form id="FormEditAdministrador" class="tab-wizard wizard-circle wizard clearfix" role="application">
                <div class="content clearfix">
								<h5 id="steps-uid-0-h-0" tabindex="-1" class="title current">Información del pedido</h5>
                <br>
								<section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">

                  <style media="screen">
                    .invoice {
                      background: #fff;
                      padding: 20px
                    }

                    .invoice-company {
                      font-size: 20px
                    }

                    .invoice-header {
                      margin: 0 -20px;
                      background: #f0f3f4;
                      padding: 20px
                    }

                    .invoice-date,
                    .invoice-from,
                    .invoice-to {
                      display: table-cell;
                      width: 1%
                    }

                    .invoice-from,
                    .invoice-to {
                      padding-right: 20px
                    }

                    .invoice-date .date,
                    .invoice-from strong,
                    .invoice-to strong {
                      font-size: 16px;
                      font-weight: 600
                    }

                    .invoice-date {
                      text-align: right;
                      padding-left: 20px
                    }

                    .invoice-price {
                      background: #f0f3f4;
                      display: table;
                      width: 100%
                    }

                    .invoice-price .invoice-price-left,
                    .invoice-price .invoice-price-right {
                      display: table-cell;
                      padding: 20px;
                      font-size: 20px;
                      font-weight: 600;
                      width: 75%;
                      position: relative;
                      vertical-align: middle
                    }

                    .invoice-price .invoice-price-left .sub-price {
                      display: table-cell;
                      vertical-align: middle;
                      padding: 0 20px
                    }

                    .invoice-price small {
                      font-size: 12px;
                      font-weight: 400;
                      display: block
                    }

                    .invoice-price .invoice-price-row {
                      display: table;
                      float: left
                    }

                    .invoice-price .invoice-price-right {
                      width: 25%;
                      background: #2d353c;
                      color: #fff;
                      font-size: 28px;
                      text-align: right;
                      vertical-align: bottom;
                      font-weight: 300
                    }

                    .invoice-price .invoice-price-right small {
                      display: block;
                      opacity: .6;
                      position: absolute;
                      top: 10px;
                      left: 10px;
                      font-size: 12px
                    }

                    .invoice-footer {
                      border-top: 1px solid #ddd;
                      padding-top: 10px;
                      font-size: 10px
                    }

                    .invoice-note {
                      color: #999;
                      margin-top: 80px;
                      font-size: 85%
                    }

                    .invoice>div:not(.invoice-footer) {
                      margin-bottom: 20px
                    }

                    .btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
                      color: #2d353c;
                      background: #fff;
                      border-color: #d9dfe3;
                    }
                  </style>

                  <div class="row">
                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                        <div class="container">
                           <div class="col-md-12">
                              <div class="invoice">
                                 <!-- begin invoice-company -->
                                 <div class="invoice-company text-inverse f-w-600">
                                    <span class="pull-right hidden-print">
                                       <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Exportar como PDF</a>
                                       <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Inprimir</a>
                                       <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa-brands fa-whatsapp"></i> Enviar a Whattsapp</a>
                                    </span>
                                    <br>
                                 </div>
                                 <!-- end invoice-company -->
                                 <!-- begin invoice-header -->
                                 <div class="invoice-header">
                                    <div class="invoice-from">
                                       <address class="m-t-5 m-b-5">
                                          <strong class="text-inverse" style="font-size: 22px;">
                                             Pedido N° <?php echo $listar['ID']; ?>
                                           </strong>
                                           <br>
                                          <b>Cliente:</b><br>
                                          <b>Direccion Envio:</b> <br> <?php echo $listar['direccion']; ?><br>
                                          <b>Contacto:</b> <?php echo $listar['telefono']; ?><br>
                                          <b>Estado:</b> <?php echo $listar['estado']; ?>
                                       </address>
                                    </div>

                                    <div class="invoice-date">
                                       <small>Fecha Realizado</small>
                                       <div class="date text-inverse m-t-5"><?php echo $listar['fecha']; ?></div>
                                    </div>
                                 </div>
                                 <!-- end invoice-header -->
                                 <!-- begin invoice-content -->
                                 <div class="invoice-content">
                                    <!-- begin table-responsive -->
                                    <div class="table-responsive">
                                       <table class="table table-invoice">
                                          <thead>
                                             <tr>
                                               <th class="text-center" width="10%"></th>
                                                <th>PRODUCTO</th>
                                                <th class="text-center" width="10%">PRECIO</th>
                                                <th class="text-center" width="10%">CANTIDAD</th>
                                                <th class="text-center" width="20%">SUBTOTAL</th>
                                                <th class="text-center" width="20%">ACCION</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              $resultado_cnsc = $obj_mantenimiento->ConsultarPlatoPedido($listar['ID']);
                                               if(mysqli_num_rows($resultado_cnsc)>0){
                                                 $cont = 0;
                                                    while ($listar_repuesto = mysqli_fetch_assoc($resultado_cnsc)) {;
                                                     $cont++;
                                                   ?>
                                                     <tr class="dato">
                                                       <td>
                                                         <img src="<?php if($listar_repuesto["foto"] != "" && $listar_repuesto["foto"] != "null"){ echo "pages/platos/upload/".$listar_repuesto["foto"];}else{ echo "vendors/images/photo1.png";} ?>"  class="border-radius-100 shadow" width="40" height="40" alt="">
                                                       </td>
                                                       <td><?php echo $listar_repuesto["plato"]; ?></td>
                                                       <td><?php echo $listar_repuesto["precio"]; ?></td>
                                                       <td class="text-center"><?php echo $listar_repuesto["cantidad"]; ?></td>
                                                       <td class="text-center"><?php echo $listar_repuesto["subtotal"]; ?></td>
                                                       <td>
                                                         <div class="btn-group">
                                                           <button  type="button"  atrib="<?php echo $listar_repuesto['ID']; ?>" class="eliminar btn btn-danger btn-sm"> Eliminar</button>
                                                           <button type="button"  atrib="<?php echo $listar_repuesto['ID']; ?>"  class="editar btn btn-warning btn-sm"> Editar</button>
                                                         </div>
                                                       </td>
                                                     </tr>
                                                     <?php
                                                      }
                                                    }else{
                                                     ?>
                                                     <tr>
                                                         <td colspan="9" style="text-align:center;">No se encontraron registros</td>
                                                     </tr>
                                                 <?php
                                                   }
                                                 ?>
                                          </tbody>
                                       </table>
                                    </div>
                                    <!-- end table-responsive -->
                                    <!-- begin invoice-price -->
                                    <div class="invoice-price">
                                       <div class="invoice-price-left">
                                          <div class="invoice-price-row">
                                             <div class="sub-price">
                                                <small>SUBTOTAL</small>
                                                <span class="text-inverse"> <?php echo $listar['subtotal']; ?></span>
                                             </div>
                                             <div class="sub-price">
                                                <i class="fa fa-plus text-muted"></i>
                                             </div>
                                             <div class="sub-price">
                                                <small>ENVIO</small>
                                                <span class="text-inverse">$ <?php echo $listar['envio']; ?></span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="invoice-price-right">
                                          <small>TOTAL</small> <span class="f-w-600"><?php echo $listar['total']; ?></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="invoice-note">
                                    * Make all cheques payable to [Your Company Name]<br>
                                    * Payment is due within 30 days<br>
                                    * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
                                 </div>
                                 <!-- end invoice-note -->
                                 <!-- begin invoice-footer -->
                                 <!--<div class="invoice-footer">
                                    <p class="text-center m-b-5 f-w-600">
                                       THANK YOU FOR YOUR BUSINESS
                                    </p>
                                    <p class="text-center">
                                       <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
                                       <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                                       <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
                                    </p>
                                 </div>-->
                                 <!-- end invoice-footer -->
                              </div>
                           </div>
                        </div>
                     </div>


								</section>
							</div>
              <div class="btn-list" style="text-align: center; display:none;">
								<button type="submit"  class="btn btn-warning" data-toggle="button" aria-pressed="false" autocomplete="off">
									<i class="fas fa-save"></i> Editar
								</button>
							</div>
             </form>
						</div>
					</div>
				</div>
			</div>

<script type="text/javascript">
$( "#fechaNac").datepicker();
  $("#FormEditAdministrador").validate({ debug: true,
    rules:{
      primer_nombre:{required: true},
      segundo_nombre:{required: true},
      direccion:{required: true},
      telefono:{required: true},
      rol:{required: true},
      fechaNac:{required: true},
      email:{required: true},
      password:{required: true}
    },
    messages:{
      primer_nombre:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
      segundo_nombre:{required: "<span class='label label-danger'>Ingrese una subcategoria</span>"},
      direccion:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
      telefono:{required: "<span class='label label-danger'>Ingrese una descripcion</span>"},
      rol:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
      fechaNac:{required: "<span class='label label-danger'>Ingrese una subcategoria</span>"},
      email:{required: "<span class='label label-danger'>Ingrese una categoria</span>"},
      password:{required: "<span class='label label-danger'>Ingrese una subcategoria</span>"}
    },
    submitHandler: function(form){
      guardarForm("pages/usuarios/editarAdministrador.php", "FormEditAdministrador", function(resultado){
      if (resultado == "err:ok") {
          funcionajax("pages/usuarios/index.php","container","");
        }
      });
      }
    });
</script>
