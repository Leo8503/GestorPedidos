<div class="form-group">
  <label>Estudiante</label>
  <select name="estud" id="estud" class="form-control">
    <option value=""></option>
   <?php
       header("Cache-Control: no-store, no-cache, must-revalidate");
       require "../../class/db/clsController.php";
       $obj_cnsc = new clsCnsc();
       $resultado_cnsc = $obj_cnsc->ConsultarAsociadosEstudiantes();
       if(mysqli_num_rows($resultado_cnsc)>0){
        $cont = 0;
          while ($listar_repuesto = mysqli_fetch_assoc($resultado_cnsc)) {;
           $cont++;
         ?>
         <option value="<?php echo $listar_repuesto['ID']; ?>"><?php echo $listar_repuesto['nombre'].' '.$listar_repuesto['apellido']; ?></option>
       <?php
        }
      }
   ?>
  </select>
  <script type="text/javascript">
  $('#estud').on('change', function() {
      var a = this.value;
      var parametros = {
          "valorCaja1": a
      };
       $.ajax({
          url : 'pages/apoderado/asociar.php',
          data : parametros,
          type : 'POST',
          success : function(response) {
            funcionajax("pages/apoderado/slcTempestudiante.php","slcestudiante","");
            funcionajax("pages/apoderado/estudianteasociados.php","estasociados","");
          },
          error : function(xhr, status) {
          },
            complete : function(xhr, status) {
          }
      });
  });
  </script>
</div>
