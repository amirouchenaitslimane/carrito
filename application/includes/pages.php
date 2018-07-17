<?php
if (!isset($_GET['p']) ) {
    include 'application/pages/home.php';

} else {
    if (!file_exists("application/pages/".$_GET['p'].".php")){
        include ('application/pages/error.php');
    }else{

        include "application/pages/".$_GET['p'].".php";
    }
}
?>
