<?php if (isset($_SESSION['user'])):

    ?>
<div class="card-header">
    <h4 class="card-title">Mi carrito:</h4>
</div>
<div class="card-body">
    <div class="row">

        <div class="col-md-12">

            <?php
                    $procesed = false;
                    $mi_carrito_manager = new CarritoManager();
                    $piezas = $mi_carrito_manager->getCrrito();

            if (isset($_GET['process'])){
                if ($cmanager->process($piezas,$_SESSION['user'])) {
                    $procesed = true;
                }

            }
            if ($procesed){
                header('location:index.php?p=micarrito&processed=ok');
            }
            ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Pieza</th>
                        <th>Cantidad</th>
                        <th class="text-center">Precio unidad</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                if (empty($piezas) || ($piezas == null && $carrito == null)){
                    unset($_SESSION['carrito']);
                    echo '<tr><td><h1>Carrito vacio</h1></td></tr>';
                }else {
                    foreach ($piezas as $key => $pieza):?>
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="#"> <img class="media-object"  src="assets/img/product/<?= $pieza->getImage(); ?>"
                                                                                  style="width: 100px; height: 100px;">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?= $pieza->getNompieza(); ?></h4>
                                    </div>
                                </div>
                            </td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <form method="post" action="?p=update_quantity">
                                    <input type="number" name="qty" min="1" class="form-control"
                                           value="<?= $_SESSION['carrito'][$pieza->getNumpieza()]; ?>">
                                    <input type="hidden" name="cod" class="form-control"
                                           value="<?= $pieza->getNumpieza(); ?>">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong><?= $pieza->getPreciovent(); ?></strong>
                            </td>
                            <td class="col-sm-1 col-md-1 text-center">
                                <strong><?= $pieza->getPreciovent() * $_SESSION['carrito'][$pieza->getNumpieza()]; ?></strong>
                            </td>
                            <td class="col-sm-1 col-md-1">
                                <a type="button" href="index.php?p=micarrito&del=<?= $pieza->getNumpieza(); ?>"
                                   class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </a></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>  </td>
                        <td>  </td>

                        <td><h3>Total</h3></td>
                        <td>  </td>
                        <td class="text-right"><h5><strong><?= $carrito->total(); ?> €</strong></h5></td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>
                            <a type="button" href="index.php?p=guardar_carrito" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Guardar Carrito
                            </a></td>
                        <td>
                            <a type="button" href="index.php?p=micarrito&process" class="btn btn-success">
                                Procesar Carrito <span class="glyphicon glyphicon-play"></span>
                            </a></td>
                        <td>
                            <a type="button" href="index.php?p=vaciar_carrito" class="btn btn-success">
                                Vaciar carrito <span class="glyphicon glyphicon-play"></span>
                            </a></td>

                    </tr>
                    <tr>

                    </tr>
                    <td>

                    </td>
                    <?php


                }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
    <?php if (isset($_GET['save']) && $_GET['save']== 'ok') {
        ?>
        <div class="col-md-12">
            <div class="alert alert-success">
                <p>Carrito Guardado en la base de datos</p>
            </div>
        </div>
        <?php
    }
    if ($procesed){
        unset($_SESSION['carrito']);
        $carrito = null;
        $piezas = null;




    }
    if (isset($_GET['processed']) && $_GET['processed'] == 'ok'){
        ?>
        <div class="col-md-12">
            <div class="alert alert-success">
                <p>Carrito procesado !</p>

            </div>
            <p>Ir a <a href="?p=mis_pedidos">mis pedidos</a></p>
        </div>
        <?php
    }
    ?>



<?php else: header('location:?p=login') ?>
<?php endif;?>
