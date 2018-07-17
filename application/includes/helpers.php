<?php
function debug($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}
function clearInput($input){
    $text = htmlspecialchars(trim($input));
    return $text;
}

/**
 * mantener valores del los inputs
 * @param $value el valor del post
 * @return string si es !empty | vacio si es empty
 */
function is_set($value)
{
    return (isset($_POST[$value])) ? $_POST[$value] : "";
}

/**
 * mostrar el valor de campo (aqui se us solo para la opciones del formulario)
 * @param $value el key del post
 * @param $flag valor del resultado
 * @return string imprime selected en las opciones
 */
function get_selected($value,$flag){
    if (isset($_POST[$value]) && $_POST[$value]== $flag){
        return "selected='selected' ";
    }
}

/**
 *
 * @param $page nombre de la pagina
 */
function redirect($page){
    return header('location:index.php?p='.$page);
}