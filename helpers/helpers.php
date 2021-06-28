<?php

function base_url(){
    return BASE_URL;
}

//HACER VARDUMP DE VARIABLES
function dep($data){
    $format = print_r("<pre>");
    $format .= print_r($data);
    $format .= print_r("</pre>");
    return $format;
}
//LIMPIAR CADENAS
function strClean($strCadena){

    $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
    $string = trim($string);
    $string = stripslashes($string);
    $string = str_ireplace("<script>","",$string);
    $string = str_ireplace("</script>","",$string);
    $string = str_ireplace("<script src>","",$string);
    $string = str_ireplace("<script type=>","",$string);
    $string = str_ireplace("SELECT * FROM","",$string);
    $string = str_ireplace("DELETE FROM","",$string);
    $string = str_ireplace("INSERT INTO","",$string);
    $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
    $string = str_ireplace("DROP TABLE","",$string);
    $string = str_ireplace("OR '1' = '1","",$string);
    $string = str_ireplace("OR ´1´ = ´1","",$string);
    $string = str_ireplace("is NULL; --","",$string);
    $string = str_ireplace("LIKE'","",$string);
    $string = str_ireplace('LIKE"',"",$string);
    $string = str_ireplace("LIKE´","",$string);
    $string = str_ireplace("OR 'a' = 'a","",$string);
    $string = str_ireplace('OR "a" = "a',"",$string);
    $string = str_ireplace("OR ´a´ = 'a","",$string);
    $string = str_ireplace("--","",$string);
    $string = str_ireplace("^","",$string);
    $string = str_ireplace("[","",$string);
    $string = str_ireplace("]","",$string);
    $string = str_ireplace("==","",$string);

    return $string;
}
// DAR FORMATO DE DINERO EN 2000.00 a 2.000,00
function formatMoney($cantidad){
    $cantidad = number_format($cantidad,2,",",".");
    return $cantidad;
}