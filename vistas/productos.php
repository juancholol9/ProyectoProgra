<?php
require 'header.php';
?>

<div class="content-wrapper">        
    <section class="content" id="content">

    <button class="btn btn-success" onclick="agregar_item()">+</button>

        <div class="card-group" id="card-group">

            <div class="card">
                <div class="w-50 p-3"><!-- Imagen -->
                    <img class="card-img-top" src="img_productos/vino_anejo.jpg" alt="Card image cap">
                </div>
                <div class="card-body"><!-- Cuerpo -->
                    <h5 class="card-title">VINO 3</h5>
                    <p class="card-text">Aqui va la info del producto.</p>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-cart-plus"> Agregar al carrito</i>
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="w-50 p-3">
                    <img class="card-img-top" src="img_productos/vino_anejo.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h5 class="card-title">VINO 3</h5>
                    <p class="card-text">Aqui va la info del producto.</p>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-cart-plus"> Agregar al carrito</i>
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="w-50 p-3">
                    <img class="card-img-top" src="img_productos/vino_anejo.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h5 class="card-title">VINO 3</h5>
                    <p class="card-text">Aqui va la info del producto.</p>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-cart-plus"> Agregar al carrito</i>
                    </button>
                </div>
            </div>

        </div>

    </section>
</div>

<script type="text/javascript" src="scripts/producto.js"></script>


<?php
require 'footer.php';
?>