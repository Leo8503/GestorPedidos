
<div class="form-group">
  <label>Estudiante</label>
  <select name="estud" id="estud" atrib="<?php echo $_POST['id']; ?>" class="form-control">
    <option value=""></option>
   <?php
       header("Cache-Control: no-store, no-cache, must-revalidate");
       require "../../class/db/clsController.php";
       $obj_cnsc = new clsCnsc();
       $resultado_cnsc = $obj_cnsc->ConsultarSlcResponsable($_POST['id']);
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
</div>

<script type="text/javascript">
$('#estud').on('change', function() {
    var b1 = this.value;
    var a1 = $("#estud").attr("atrib");
    var parametros = {
        "valorCaja1": a1,
        "valorCaja2": b1
    };
    $.ajax({
        url : 'pages/apoderado/editarasocicion.php',
        data : parametros,
        type : 'POST',
        success : function(response) {
          funcionajax("pages/apoderado/slcestudiante.php","slcestudiante",<?php echo $_POST['id']; ?>);
          funcionajax("pages/apoderado/responsables.php","estasociados",<?php echo $_POST['id']; ?>);
        },
        error : function(xhr, status) {
        },
          complete : function(xhr, status) {
        }
    });
});
</script>
