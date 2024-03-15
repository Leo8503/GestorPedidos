<div class="xs-pd-20-10 pd-ltr-20">
  <div class="title pb-20">
    <h2 class="h3 mb-0">Administrador</h2>
  </div>

  <div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4></h4>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="dropdown">
						<a class="btn btn-primary" id="addadmin" href="javascript:void(0);"  role="button">
              <i class="fa fa-plus" aria-hidden="true"></i>
        			Agregar Nuevo Administrador
						</a>
					</div>
				</div>
			</div>
		</div>

    <script type="text/javascript">
      $("#addadmin").click(function(){
         funcionajax("pages/administrador/addForm.php","container","");
      });
    </script>

  <div class="card-box pb-10">
    <div class="h5 pd-20 mb-0">Administrador</div>
    <table class="data-table table nowrap" id="table14">
      <thead>
        <tr>
          <th class="table-plus">ID</th>
          <th>Correo</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Telefono</th>
          <th>Estado</th>
          <th class="datatable-nosort" style="text-align:center;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
         require "../../class/db/clsController.php";
         $obj_cnsc = new clsCnsc();
         $resultado_cnsc = $obj_cnsc->ConsultarAdministrador();
          if(mysqli_num_rows($resultado_cnsc)>0){
            $cont = 0;
               while ($listar_repuesto = mysqli_fetch_assoc($resultado_cnsc)) {;
                $cont++;
              ?>
                <tr class="dato">
                  <td><?php echo $cont; ?></td>
                  <td><?php echo $listar_repuesto["correo"]; ?></td>
                  <td><?php echo $listar_repuesto["nombre"]; ?></td>
                  <td><?php echo $listar_repuesto["apellido"]; ?></td>
                  <td><?php echo $listar_repuesto["telefono"]; ?></td>
                  <td><?php echo $listar_repuesto["estado"]; ?></td>
                  <td style="text-align:center;">
                    <div class="btn-group">
                      <button type="button"  atrib="<?php echo $listar_repuesto['id']; ?>" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                      <button type="button"  atrib="<?php echo $listar_repuesto['id']; ?>"  class="editar btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
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
</div>



<script type="text/javascript">
  $('#table14').DataTable({
    searching: true,
    ordering:  true,
    lengthChange: true,
    bInfo : false
  });

  $(".editar").click(function(){
    var a = $(this).attr('atrib');
    funcionajax("pages/docentes/editarForm.php","container",a);
  });

  $(".eliminar").click(function(){
    var a = $(this).attr("atrib");
    var parametros = {
        "valorCaja1" : a
    };
    $.ajax({
       url : 'pages/docentes/eliminar.php',
       data:  parametros,
       type: "post",
       success : function(response) {
           funcionajax("pages/docentes/index.php","container","");
       },
       error : function(xhr, status) {
           funcionajax("pages/docentes/index.php","container","");
       },
       complete : function(xhr, status) {
       }
    });

  });
</script>
