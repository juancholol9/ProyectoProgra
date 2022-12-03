<?php
require 'header.php';
?>

<div class="content-wrapper">        
  <section class="content">

  <br>
  <h1>CARRITO DE COMPRAS</h1>
  <br>
  
  <div class="table-responsive">
    <table class="table  align-middle text-center align-self-center">
      <tbody>
        <tr>
          <td class="align-middle"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button></td>
          <td><img class="w-50 p-3" src="img_productos/vino_anejo.jpg" alt="Imagen del producto"></td>
          <td class="w-50 p-3 align-middle">Aqui va la descripcion del producto</td>
          <td class="w-25 p-3 ">$150.00</td>
        </tr>
        <tr>
          <td colspan="3"></td>
          <td>Precio Total: </td>
        </tr>
      </tbody>
    </table>
  </div>

  </section>
</div>

<?php
require 'footer.php';
?>

<script type="text/javascript" src="scripts/producto.js"></script>
