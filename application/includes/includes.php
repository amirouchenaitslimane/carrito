<?php
session_start();
require_once 'application/class/Usuario.php';
require_once 'application/class/Database.php';
require_once 'application/class/Pedido.php';
require_once 'application/class/Lineapedido.php';
require_once 'application/class/Pieza.php';
require_once 'application/class/Carrito.php';

//include managers
require_once 'application/class/managers/UsuarioManager.php';
require_once 'application/class/managers/PedidoManager.php';
require_once 'application/class/managers/LineapedidoManager.php';
require_once 'application/class/managers/PiezaManager.php';
require_once 'application/class/managers/CarritoManager.php';

//crear instancias de las classes
$umanager = new UsuarioManager();
$cmanager = new CarritoManager();
$pmanager = new PiezaManager();
$pedido_manager = new PedidoManager;
$carrito = new Carrito();
$linea_pedido = new LineapedidoManager();