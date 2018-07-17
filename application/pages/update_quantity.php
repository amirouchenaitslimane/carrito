<?php
$manager = new PiezaManager();
if (isset($_POST['submit'])) {
    $updated = false;
    $p = $manager->getByid($_POST['cod']);
    if ($carrito->updateQty($p, $_POST['qty'])) {
        $updated == TRUE;
    }
    redirect('micarrito');
}