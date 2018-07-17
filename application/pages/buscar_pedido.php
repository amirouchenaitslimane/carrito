<?php
$pedidos_encontrado = $linea_pedido->search($_POST);
if (!empty($pedidos_encontrado)) {
    ?>
		<h1>Resultado de busqueda : hemos encontrado "<?= count($pedidos_encontrado); ?>" resultado(s)</h1>
		<div class="card-body table-full-width table-responsive">
		<table class="table table-hover table-striped">
				<thead>
				<th>numero pedido</th>
				<th>nom pieza</th>
				<th>quantidad pedida</th>
				<th>quantidad recebida</th>
				<th>precio compra</th>
				<th>fecha</th>
				<th>Eliminar</th>
				</thead>
				<tbody>
        <?php foreach ($pedidos_encontrado as $pedido): ?>
						<tr>
								<td><?= $pedido->getNumpedido() ?></td>
<td class="text-center"><?php echo $pmanager->getByid($pedido->getNumpieza())->getNumpieza()." - ".$pmanager->getByid($pedido->getNumpieza())->getNompieza()  ?></td>

							<td class="text-center"><?= $pedido->getCantrecibida() ?></td>
								<td class="text-center"><?= $pedido->getCantrecibida() ?></td>
								<td class="text-center"><?= $pedido->getPreciocompra() ?> €</td>
								<td class="text-right"><?= $pedido->getFecharecep() ?></td>
								<td class="text-right"><a class="btn btn-danger"	href="index.php?p=mis_pedidos&num=<?= $pedido->getNumlinea(); ?>&pedido=<?= $pedido->getNumpedido() ?>"><span	class="glyphicon glyphicon-remove"></span></a></td>
						</tr>

        <?php endforeach; ?>
				</tbody>
		</table>
		</div>

		<div class="row">
				<h1>DETALLE DE LAS PIEZAS PEDIDAS</h1>
				<div class="card-body table-full-width table-responsive">
						<table class="table table-hover table-striped">
								<thead>
								<th>numero pieza</th>
								<th>nom pieza</th>
								<th>precio</th>

								</thead>
								<tbody>
    <?php foreach ($pedidos_encontrado as $pedido): ?>
		<tr>
				<td> <?= $pmanager->getByid($pedido->getNumpieza())->getNumpieza() ?> </td>
				<td> <?= $pmanager->getByid($pedido->getNumpieza())->getNompieza() ?> </td>
				<td> <?= $pmanager->getByid($pedido->getNumpieza())->getPreciovent() ?> e</td>

		</tr>
    <?php endforeach; ?>

								</tbody>
						</table>

				</div>
		</div>
    <?php
}else{
		?>
		<h1>OPS NO EXSITE PEDIDO CON <?= $_POST['field'] ?> por creterio <?= $_POST['criterio']; ?></h1>
		<?php
}
?>