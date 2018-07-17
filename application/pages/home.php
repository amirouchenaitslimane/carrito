<?php if (isset($_SESSION['user'])):
    $piezas = $pmanager->getAll();//array de objetos Pieza(array);


		?>
		<div class="card-header">
				<h4 class="card-title">Productos</h4>
		</div>
		<div class="card-body">
				<div class="row">
						<div class="col-md-8 search">
								<form class="form-inline" method="post">
										<div class="form-group">
												<select class="form-control" name="criterio">
														<option value="NOMPIEZA" <?php echo get_selected("criterio", "NOMPIEZA"); ?>>Nombre</option>
														<option value="PRECIOVENT" <?php echo get_selected("criterio", "PRECIOVENT"); ?>>precio</option>
														<option value="NUMPIEZA" <?php echo get_selected("criterio", "NUMPIEZA"); ?>>numero</option>
												</select>
										</div>
										<div class="form-group">
												<input type="search" class="form-control" name="field" id="search" placeholder="buscar...">
										</div>
										<button type="submit" name="find" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
								</form>
						</div>
				</div>
				<div class="row ">
						<?php
						//si el uauario busca una pieza incluimos el fichero pieza
						if (isset($_POST['find'])){
								require_once 'buscar_pieza.php';
						}else {//si no mostramos todas las piezas de la tabla
                ?>
								<div class="product">
										<div class="col-md-12">
                        <?php foreach ($piezas as $pieza): ?>
														<div class="col-sm-4">
																<div class="product-image-wrapper">
																		<div class="single-products">
																				<div class="productinfo text-center">
																						<img class="card-img-top" src="assets/img/product/<?= $pieza->getImage(); ?>" alt=""/>
																						<h2><?= $pieza->getPreciovent(); ?></h2>
																						<p><?= $pieza->getNompieza(); ?></p>
																						<a href="index.php?p=add_item&numpieza=<?= $pieza->getNumpieza(); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Añadir </a>

																				</div>
																		</div>
																</div>
														</div>

                        <?php endforeach; ?>
										</div>
								</div>
                <?php
            }
						?>
		</div>
<?php else: redirect('login');?>
<?php endif;?>
