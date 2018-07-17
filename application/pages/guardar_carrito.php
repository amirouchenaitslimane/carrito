<?php
    $user = $umanager->getUser($_SESSION['user']);//devolver el usuario actual
    $micarrito = $cmanager->getCarrito($user); //devolver el carrito del usuario
    if ($cmanager->saveCarrito($user) == true){ //guardar carrito
        //redirect('micarrito&save=ok');
        header('location:index.php?p=micarrito&save=ok');
    }