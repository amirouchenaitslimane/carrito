<?php
//esa pagina permite agregar una pieza a la session[carrito]
if (isset($_GET['numpieza'])) {
    $numpieza = $_GET['numpieza'];
    $pieza = $pmanager->getByid($numpieza);
    $carrito->add($pieza);
    //header('Location:index.php?p=home');
    redirect('home');
}

?>
