<?php
$piezas_finded = $pmanager->search($_POST);//piezas encontradas en la base de datos
if (!empty($piezas_finded)){?>
    <h1>Resultado : hemos encontrado <?= count($piezas_finded); ?> pieza(s)</h1>
    <?php foreach ($piezas_finded as $pieza):?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="public/img/product/raton.jpg" alt="" width="200px" height="200px" />
                        <h2><?= $pieza->getPreciovent();?></h2>
                        <p><?= $pieza->getNompieza();?></p>
                       <a href="index.php?p=add_item&numpieza=<?= $pieza->getNumpieza();?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Añadir al carrito</a>
                    </div>

                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2><?= $pieza->getPreciovent();?></h2>
                            <p><?= $pieza->getNompieza();?></p>
                            <a href="index.php?p=add_item&numpieza=<?= $pieza->getNumpieza();?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Añadir</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
    <?php
}else{//si es vacio mostramos un mensaje
    echo "<h3>Hemos encontrado (0) resultado por la busqueda de ".$_POST['field']." por creterio ".$_POST['criterio']."</h3>";
}
?>