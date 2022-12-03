<?php
require 'header.php';
?>

<div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">


        

          
        
        <section class="content">
          
        <div id="botones"> 
          
        <button type="button" onclick="mostrar()"; class="btn btn-primary">CREAR REGISTRO</button>
        </div>
        <br> 
         <div class="panel-body table-responsive" id="listadoregistros">
                         <table id="tbllistado" class="table">
                           <thead>
                           <th>Opciones</th>
                           <th>N. Identidad</th>
                           <th>IDgerente</th>
                           <th>Gerente</th>
                           <th>Telefono</th>
                           <th>Direccion</th>
                           <th>Longevidad</th>
                           <th>estado</th>
                          </thead>
                           <tbody>                            
                           </tbody>
                           <tfoot>
                           <thead>
                           <th>Opciones</th>
                           <th>IDgerente</th>
                           <th>N. Identidad</th>
                           <th>Gerente</th>
                           <th>Telefono</th>
                           <th>Direccion</th>
                           <th>Longevidad</th>
                           <th>estado</th>
                           </tfoot>
                         </table>
                     </div>
         <div class="panel-body" style="height: 400px;" id="formularioregistros">
         
         <div>
 
 </section>

              </section>
              
</div>


        <!-- Main content -->
       


<?php
require 'footer.php';
?>
<!--
<script>
  $(function () {
    $("#tbllistado").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tbllistado_wrapper .col-md-6:eq(0)');
   
  });
</script>-->





<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Formulario Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      <form role="form"  id="formulario" name="formulario">
            <div class="row">
            <div class="col-md-4">
                <label> Num. Identidad:</label>
                <input type="text" class="form-control" placeholder="Ingrese numero de identidad" name="identidad" id="identidad" required>
              </div>
            <div class="col-md-4">
                <label> Gerente:</label>
                <input type="text" class="form-control" placeholder="Ingrese nombre del gerente" name="gerente" id="gerente" required>
                <input type="text" hidden name="idgerente" id="idgerente">
              </div>
              
              <div class="col-md-4">
                <label> Telefono:</label>
                <input type="text" class="form-control" placeholder="Ingrese el telefono de contacto" name="telefono" id="telefono" required>
              </div>
              <div class="col-md-4">
                <label> Direccion:</label>
                <input type="text" class="form-control" placeholder="Ingrese direccion del proveeedor" name="direccion" id="direccion" required>
              </div>
              <div class="col-md-4">
                <label> Longevidad:</label>
                <input type="text" class="form-control" placeholder="Ingrese los años de longevidad" name="longevidad" id="longevidad" required>
              </div>
              
        <section class="content">
          <br>
        <div id="botones"> 
          
        <button type="button" onclick="guardarRegistro()"; class="btn btn-primary">GUARDAR REGISTRO</button>
        </div>


</div>
</div>


-->


<script type="text/javascript" src="scripts/gerentes.js"></script>
