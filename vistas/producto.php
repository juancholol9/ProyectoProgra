<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
<script src="../Alert/sweetalert-dev.js"></script>
<link rel="stylesheet" href="../Alert/sweetalert.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- ESTILO CURSOS DE PROGRAMACION -->
<link rel="stylesheet" href="../css/style_cp.css">
<title>Carrito paso 1</title>
</head>
<body>
<style>
.container_card{    margin: 0 auto;    padding:  0px 20px 20px 20px;    display: grid;    /* width: 800px; */    grid-template-columns: 1fr 1fr ;   grid-gap:1em;        /* grid-row-gap: 60px; */}
.blog-post{    position: relative;    margin-bottom: 15px;    margin: 30px;}
.blog-post img{    width: 100%;    height: 450px;    object-fit: cover;    border-radius: 10px;    }
.blog-post .category{    position: absolute;    top: 20px;    left: 20px;    padding: 10px 15px;  font-size: 14px;    text-decoration: none;    background-color: #e67e22;    color: #fff;    border-radius: 5px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.1);    text-transform: uppercase;}
.text-content{    position: absolute;    bottom: -30px;    padding: 20px;    background-color: #fff;    width: calc(100% - 20px);    left: 50%;    transform: translateX(-50%);    border-radius: 10px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.08);/* padding-top: 50px; */}
.text-content h2{    font-size: 20px;    font-weight: 400;    /* margin-bottom: 30px; */}
.text-content img{    height: 70px;    width: 70px;    border: 5px solid rgba(0,0,0,0.1);    border-radius: 50%;    position: absolute;    top: -35px;    left: 35px;}
.tags a{    color: #888;    font-weight: 700;    text-decoration: none;    margin-right: 15px;    transition: 0.3s ease;}
.tags a:hover{    color: #000;}
@media screen and (max-width: 1100px) {    .container_card{        grid-template-columns: 1fr 1fr;        grid-row-gap: 60px;    }}
@media screen and (max-width: 600px) {    .container_card{        grid-template-columns: 1fr;        grid-row-gap: 60px;    }}
</style>

<?php  session_start();
require 'header.php';
include("../config/conexion.php");
include("nav_cart.php"); 
include("modal_cart.php");
?>

<div class="content-wrapper">        
    <section class="content">

        <?php $busqueda=mysqli_query($conexion,"SELECT * FROM producto"); 
            $numero = mysqli_num_rows($busqueda); ?>

        <?php while ($resultado = mysqli_fetch_assoc($busqueda)){ ?>
            <form id="formulario" name="formulario" method="post" action="cart.php">
            <div class="table-responsive">
                <table class="table  align-middle text-center align-self-center">
                    <tbody>
                        <tr>
                            <td class="align-middle"><input name="idproducto" type="hidden" id="idproducto" value="<?php echo $resultado["idproducto"]; ?>" /></td>
                            <td class="align-middle w-25 p-3"><input name="producto" type="hidden" id="producto" value="<?php echo $resultado["producto"]; ?>" /></td>
                            <td class="align-middle"><img height=100 width=100 src="img_productos/<?php echo $resultado["img"]; ?>.jpg" ></td>
                            <td class="align-middle w-25 p-3"><p><?php echo $resultado["descripcion"]; ?></p></td>
                            <td class="align-middle w-25 p-3 "><input name="producto" type="hidden" id="producto" value="<?php echo $resultado["producto"]; ?>" /></td>
                            <td class="align-middle w-25 p-3 "><input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2"/></td>
                            <td class="align-middle w-25 p-3 "><button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button></td>
                            <td class="align-middle w-25 p-3 "><input name="precio" type="hidden" id="precio" value="<?php echo $resultado["precio"]; ?>" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </form>
        <?php } ?>

    </section>
</div>

<?php
// require 'footer.php';
?>