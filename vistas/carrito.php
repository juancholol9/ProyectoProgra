<?php session_start();

if(isset($_SESSION["carrito"]) || isset($_POST["producto"])){
  if(isset($_SESSION["carrito"])){
      $carrito_mio=$_SESSION["carrito"];
      if(isset($_POST["producto"])){
          $producto=$_POST["producto"];
          $precio=$_POST["precio"];
          $cantidad=$_POST["cantidad"];
          $idproducto=$_POST["idproducto"];
          $donde=-1;
          for($i=0;$i<=count($carrito_mio)-1;$i ++){
            if($idproducto==$carrito_mio[$i]["idproducto"]){
            }
          }
          if($donde != -1){
              $cuanto=$carrito_mio[$donde]["cantidad"] + $cantidad;
              $carrito_mio[$donde]=array("producto"=>$producto,
"precio"=>$precio, "cantidad"=>$cuanto,"idproducto"=>$idproducto);
          }else{
              $carrito_mio[]=array("producto"=>$producto,
"precio"=>$precio,"cantidad"=>$cantidad,"idproducto"=>$idproducto);
          }
      }
  }else{
      $producto=$_POST["producto"];
      $precio=$_POST["precio"];
      $cantidad=$_POST["cantidad"];
      $idproducto=$_POST["idproducto"];
      $carrito_mio[]=array("producto"=>$producto,
"precio"=>$precio,"cantidad"=>$cantidad,"idproducto"=>$idproducto);    
  }
  if(isset($_POST["cantidad"])){
      $id=$_POST["id"];
      $cuantos=$_POST["cantidad"];
      if($cuantos<1){
          $carrito_mio[$id]=NULL;
      }else{
          $carrito_mio[$id]["cantidad"]=$cuantos;
      }
  }
  if(isset($_POST["id2"])){
      $id=$_POST["id2"];
      $carrito_mio[$id]=NULL;
  }
$_SESSION["carrito"]=$carrito_mio;
}

// header("Location: ".$_SERVER["HTTP_REFERER"]."");

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
