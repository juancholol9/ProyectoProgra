<?php  session_start();
require 'header.php';
include("../config/conexion.php");
?>

<?php 
// include("../Admin/navbar.php"); 
// include("nav_cart.php"); 
include("modal_cart.php");
?>

<div class="content-wrapper">        
    <section class="content">

        <div class="center mt-5">
            <div class="card pt-3" >
                    <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Carrito de compra</p>
                <div class="container-fluid p-2" style="background-color: ghostwhite;">

                    <?php $busqueda=mysqli_query($conexion,"SELECT * FROM producto"); 
                    $numero = mysqli_num_rows($busqueda); ?>

                    <h5 class="card-tittle">Resultados (<?php echo $numero; ?>)</h5>
                    <div class="container_card">
                    <?php while ($resultado = mysqli_fetch_assoc($busqueda)){ 
                    
                            ?>

                            <form id="formulario" name="formulario" method="post" action="cart.php">
                                <div class="blog-post ">
                                    <img src="../Insertar artículo/articulos/<?php echo $resultado["img"]; ?>.jpg" >
                                    <a class="category">
                                        <?php echo $resultado["precio"]; ?>€
                                    </a>
                                        <div class="text-content">
                                            <input name="idproducto" type="hidden" id="idproducto" value="<?php echo $resultado["idproducto"]; ?>" />                           
                                            <input name="precio" type="hidden" id="precio" value="<?php echo $resultado["precio"]; ?>" />
                                            <input name="titulo" type="hidden" id="titulo" value="<?php echo $resultado["titulo"]; ?>" />
                                            <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                                                <div class="card-body">
                                                        <h5 class="card-title"><?php echo $resultado["titulo"]; ?></h5>
                                                        <p><?php echo $resultado["descripcion"]; ?></p>
                                                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                                                </div>
                                        </div>
                                </div>
                            </form>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require 'footer.php';
?>