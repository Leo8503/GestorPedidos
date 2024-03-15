<div class="form-group">
  <label>Estudiantes Asociados</label>
  <table class="data-table table nowrap dataTable" id="selTable">
    <tbody>
      <?php
        header("Cache-Control: no-store, no-cache, must-revalidate");
        require "../../class/db/clsController.php";
        $obj_cnsc = new clsCnsc();
        $resultado_cnsc = $obj_cnsc->ConsultarTempEstudiante();
         if(mysqli_num_rows($resultado_cnsc)>0){
           $cont = 0;
              while ($listar = mysqli_fetch_assoc($resultado_cnsc)) {;
               $cont++;
               ?>
               <tr>
                   <td>
                     <img src="vendors/images/photo1.png" class="border-radius-100 shadow" width="40" height="40" alt="">
                   </td>
                   <td>
                     <div>
                     <label for="customCheck1"><?php echo $listar['nombre'].' '.$listar['apellido']; ?></label>
                     </div>
                   </td>
                   <td>
                     <button type="button" atrib="<?php echo $listar['ID']; ?>" class="QuitarEstudiante btn btn-danger btn-sm">Quitar</button>
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

<script type="text/javascript">
  $(".QuitarEstudiante").click(function(){
    var a = $(this).attr("atrib");
    var parametros = {
        "valorCaja1" : a
    };
    $.ajax({
       url : 'pages/apoderado/limpiartemp.php',
       data:  parametros,
       type: "post",
       success : function(response) {
         funcionajax("pages/apoderado/slctempestudiante.php","slcestudiante","");
         funcionajax("pages/apoderado/estudianteasociados.php","estasociados","");
       },
       error : function(xhr, status) {
       },
       complete : function(xhr, status) {
       }
    });

  });
</script>
