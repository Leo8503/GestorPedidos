<?php
  require "../../class/db/clsController.php";
  $obj_cnsc = new clsCnsc();
  $clientes = $obj_cnsc->CantidadClientes();
  $listar_clientes = mysqli_fetch_assoc($clientes);
  //echo $listar_usuarios['cantidad'];
  $pedidos = $obj_cnsc->CantidadPedidos();
  $listar_pedidos = mysqli_fetch_assoc($pedidos);
  //echo $listar_noticias['cantidad'];
  $platos = $obj_cnsc->CantidadPlatos();
  $listar_platos = mysqli_fetch_assoc($platos);
  //echo $listar_especialistas['cantidad'];
  $categorias = $obj_cnsc->CantidadCategoria();
  $listar_categorias = mysqli_fetch_assoc($categorias);
  //echo $listar_tratamientos['cantidad'];
?>
<div class="xs-pd-20-10 pd-ltr-20">
  <div class="title pb-20">
    <h2 class="h3 mb-0">Resumen</h2>
  </div>

  <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark"><?php echo $listar_clientes['cantidad']; ?></div>
              <div class="font-14 text-secondary weight-500">
                Clientes
              </div>
            </div>
            <div class="widget-icon">
              <div class="icon">
                  <i class="icon-copy fa fa-group" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark"><?php echo $listar_pedidos['cantidad']; ?></div>
              <div class="font-14 text-secondary weight-500">
                Pedidos
              </div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#ff5b5b">
                <span class="icon-copy ti-check-box"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark"><?php echo $listar_platos['cantidad']; ?></div>
              <div class="font-14 text-secondary weight-500">
                Platos
              </div>
            </div>
            <div class="widget-icon">
              <div class="icon">
                  <i class="fa fa-cutlery" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark"><?php echo $listar_categorias['cantidad']; ?></div>
              <div class="font-14 text-secondary weight-500">Categorias</div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#09cc06">
                 <i class="fa fa-archive" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 col-md-6 mb-20">

      <div class="card-box height-100-p pd-20 min-height-200px">
        <div class="d-flex justify-content-between pb-10">
          <div class="h5 mb-0">Pedidos</div>
        </div>
        <div class="user-list">
          <!--<ul>
             <li class="d-flex align-items-center justify-content-between">
               <div class="name-avatar d-flex align-items-center pr-2">
                 <div class="avatar mr-2 flex-shrink-0">
                 <img
                     src="vendors/images/photo1.png"
                     class="border-radius-100 box-shadow"
                     width="50"
                     height="50"
                     alt=""/>
                 </div>
                 <div class="txt">
                   <div class="font-14 weight-600">Adrian Rodriguez</div>
                   <div class="font-12 weight-500" data-color="#b2b1b6">
                     1117489249
                   </div>
                 </div>
               </div>
               <div class="cta flex-shrink-0">
                 <a href="#"  class="Detailsperf btn btn-sm btn-outline-primary">Ver Perfil</a>
               </div>
             </li>
          </ul>-->
          <div class="row">
            <div id="chart5" class="col-md-12"></div>
          </div>

        </div>
      </div>
    </div>


    <script type="text/javascript">
    var chart = new ApexCharts(document.querySelector("#chart5"), options5);
    chart.render();






    $(".Detailsperf").click(function(){
      $('.dropdown-toggle').removeClass('active');
      $('.estudiante').addClass('active');
      var a = $(this).attr('atrib');
      funcionajax("pages/estudianteS/editarForm.php","container",a);
    });

    </script>
    <div class="col-lg-4 col-md-12 mb-20">
      <div class="card-box height-100-p pd-20 min-height-200px">
        <div class="max-width-300 mx-auto">
          <img src="vendors/images/upgrade.jpeg" alt="" />
        </div>
        <div class="text-center">
          <div class="h5 mb-1">Ubicacion de Pedidos</div>
          <div
            class="font-14 weight-500  mx-auto pb-20"
            data-color="#a6a6a7">
            Crear y rastrea y haz seguimiento a tus clientes y a sus pedidos.
          </div>
          <a href="#" class="btn btn-primary btn-lg"> Mostrar </a>
        </div>
      </div>
    </div>
  </div>

  <div class="card-box pb-10">
    <div class="h5 pd-20 mb-0">Ultimos Pedidos</div>
    <table class="data-table table nowrap">
      <thead>
        <tr>
          <th class="table-plus">ID</th>
          <th>Pedido</th>
          <th>Contacto</th>
          <th>Dirección</th>
          <th>Total</th>
          <th>Estado</th>
          <th class="datatable-nosort" style="text-align:center;">Accion</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $resultado_cnsc = $obj_cnsc->ConsultarUltimosPedidos();
           if(mysqli_num_rows($resultado_cnsc)>0){
             $cont = 0;
                while ($listar_repuesto = mysqli_fetch_assoc($resultado_cnsc)) {;
                 $cont++;
               ?>
                 <tr class="dato">
                   <td><?php echo $cont; ?></td>
                   <td><?php echo $listar_repuesto["ID"]; ?></td>
                   <td><?php echo $listar_repuesto["telefono"]; ?></td>
                   <td><?php echo $listar_repuesto["direccion"]; ?></td>
                   <td><?php echo $listar_repuesto["total"]; ?></td>
                   <td><?php echo $listar_repuesto["estado"]; ?></td>
                   <td style="text-align:center;">
                     <div class="btn-group">
                       <button type="button"  style="background: #e67e22 !important;:" atrib="<?php echo $listar_repuesto['ID']; ?>" class="details btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i> Ver Detalle</button>
                     </div>
                   </td>
                 </tr>
                 <?php
                  }
                }else{
                 ?>
                 <tr>
                     <td colspan="7" style="text-align:center;">No se encontraron registros</td>
                 </tr>
             <?php
               }
             ?>
      </tbody>
    </table>
  </div>

<script type="text/javascript">
$(".Detailspruebas").click(function(){
  $('.dropdown-toggle').removeClass('active');
  $('.prueba').addClass('active');
  var a = $(this).attr('atrib');
  funcionajax("pages/pruebas/editarForm.php","container",a);
});

$(".details").click(function(){
  $('.dropdown-toggle').removeClass('active');
  $('.pedidos').addClass('active');

  var a = $(this).attr('atrib');
  funcionajax("pages/pedidos/editarForm.php","container",a);
});

</script>

<br>
  <div class="footer-wrap pd-20 mb-20 card-box">
    Asaditas Gourmet
  </div>
