<?php if(isset($_SESSION['user'])):?>
<div class="card-header">
    <h4 class="card-title">Mis pedidos</h4>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-8 search">
            <form class="form-inline" method="post" >
                <div class="form-group">
                    <select class="form-control" name="criterio">
                        <option value="NUMPEDIDO" <?php echo get_selected("criterio", "NUMPEDIDO"); ?>>Número pedido</option>
                        <option value="FECHARECEP" <?php echo get_selected("criterio", "FECHARECEP"); ?>>Fecha</option>
                        <option value="NUMPIEZA" <?php echo get_selected("criterio", "NUMPIEZA"); ?>>Número pieza</option>
                        <option value="NOMPIEZA" <?php echo get_selected("criterio", "NOMPIEZA"); ?>>Nombre pieza</option>
                        <option value="CANTPEDIDA" <?php echo get_selected("criterio", "CANTPEDIDA"); ?>>Cantidad</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="search" class="form-control" name="field" id="search" placeholder="buscar...">
                </div>
                <button type="submit" name="find" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
    <?php
    $mis_pedidos = $pedido_manager->getPedido($_SESSION['user']);
    if(isset($_POST['find'])){
        require_once 'buscar_pedido.php';
    }else{
    if (empty($mis_pedidos)){
        echo '<h1>No tienes pedidos </h1>';
    }else{
    if (isset($_GET['num'])) {
        $pedido_manager->delet_pedido($_GET['pedido'],$_GET['num']);
        redirect('mis_pedidos');

    }

    $lineas = [];
    foreach ($mis_pedidos as $mis_pedido) {
        $lineas[] = $linea_pedido->getLinea($mis_pedido->getNumpedido());

    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">datos del vendedor: </h4>
                    <p class="card-category">
                        Nombre: <?php echo $umanager->getUser($_SESSION['user'])->getNomvend(); ?></p>
                    <p class="card-category">
                        Telefono: <?php echo $umanager->getUser($_SESSION['user'])->getTelefono(); ?></p>
                    <p class="card-category">Localidad: <?php echo $umanager->getUser($_SESSION['user'])->getCalle(); ?>
                        ,
                        <?php echo $umanager->getUser($_SESSION['user'])->getCiudad(); ?>,
                        <?php echo $umanager->getUser($_SESSION['user'])->getProvincia(); ?>.
                    </p>
                    <p>Fecha del pedido <?= $mis_pedido->getFecha(); ?></p>


                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th class="text-center">numero pedido</th>
                        <th class="text-center">nom pieza</th>
                        <th class="text-center">quantidad pedida</th>
                        <th class="text-center">quantidad recebida</th>
                        <th class="text-center">precio compra</th>
                        <th class="text-center">fecha</th>
                        <th class="text-center">Eliminar</th>
                        </thead>
                        <tbody>

                        <tr>
                            <?php

                            foreach ($lineas

                            as $lineasp) {
                            $is_empty = false;
                            if (count($lineasp) !== 0){

                            foreach ($lineasp

                            as $linea) {

                            ?>
                        <tr>
                            <td class="text-center"><?= $linea->getNumpedido() ?></td>
														<td class="text-center"><?= $pmanager->getByid(trim($linea->getNumpieza()))->getNumpieza() ?>-<?= $pmanager->getByid(trim($linea->getNumpieza()))->getNompieza() ?></td>
                            <td class="text-center"><?= $linea->getCantrecibida() ?></td>
                            <td class="text-center"><?= $linea->getCantrecibida() ?></td>
                            <td class="text-center"><?= $linea->getPreciocompra() ?> €</td>
                            <td class="text-center"><?= $linea->getFecharecep() ?></td>
                            <td class="text-center"><a class="btn btn-danger"
                                                      href="index.php?p=mis_pedidos&num=<?= $linea->getNumlinea(); ?>&pedido=<?= $linea->getNumpedido() ?>"><span
                                        class="glyphicon glyphicon-remove"></span></a></td>
                        </tr>


                        <?php

                        }
                        } else {
                            $is_empty = true;
                        }

                        }
                        ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
}
else: redirect('login');
endif;