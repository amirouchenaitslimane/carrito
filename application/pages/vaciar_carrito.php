<?php
$cmanager->deleteCarrito($_SESSION['user']);
unset($_SESSION['carrito']);
redirect('micarrito');
