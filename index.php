<?php
require_once 'application/includes/includes.php';
require_once 'application/includes/helpers.php';
if (isset($_GET['del'])){
    $pieza = $pmanager->getByid($_GET['del']);
    $carrito->remove($pieza);
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito de caompras </title>
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="public/assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?p=home">Carrito</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<?php if (isset($_SESSION['user']))://Ocultar enlaces si no existe un usuario?>
                <ul class="nav navbar-nav">
                    <li><a href="?p=home">Home</a></li>
										<li><a href="?p=mis_pedidos">Mis pedidos</a></li>
										<li><a href="?p=logout">Logout</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="cart"><a href="?p=micarrito">Cart item( s ) { <?php if($carrito != null){ echo $carrito->count();}else{ echo " "; } ?> } </a></li>
								</ul>
								<?php endif; ?>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
<div class="container">
		<div class="row">
				<div class="main-panel">
						<div class="content">
								<div class="container-fluid">
										<div class="row">
												<div class="col-md-12">
														<div class="card-content">

																<?php require_once 'application/includes/pages.php';?>

														</div>
												</div>

										</div>
								</div>

						</div>

				</div>

		</div>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="public/assets/js/bootstrap.min.js"></script>

</body>
</html>