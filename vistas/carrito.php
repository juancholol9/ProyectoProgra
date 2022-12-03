<?php
require 'header.php';
?>

<div class="content-wrapper">        
  <section class="content">

    <div class="card">
      <div class="card-header">
        <h1 class="card-title">PRODCUTO 1</h1>
        <div class="card-tools">
          <!-- Remove Button -->
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> Eliminar Producto</button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> Minimizar Producto</button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="col-md-8">
        <div class="card-body d-flex">
          <img class="w-25 p-3" src="img_productos/vino_anejo.jpg" alt="Imagen del producto">
          <p>Aqui va la descripcion del producto</p>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
</div>

<?php
require 'footer.php';
?>

<script type="text/javascript" src="scripts/producto.js"></script>
