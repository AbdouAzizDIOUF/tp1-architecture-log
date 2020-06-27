<?php

$uri = explode("?", $_SERVER['REQUEST_URI']);
$param = $uri['1'];
$query = $uri['0'];

if ($_SERVER['REQUEST_URI'] === '/'){
    ob_start();
    require 'vue/postVue.php';
    $content = ob_get_clean();
    require 'default.php';
}elseif( $query=== '/postdetail'){
        ob_start();
        require 'vue/detaillePostVue.php';
        $content = ob_get_clean();
        require 'default.php';
}elseif ($query==='/category'){
    ob_start();
    require 'vue/postByCategoryVue.php';
    $content = ob_get_clean();
    require 'default.php';
}else{
    Ob_start();
    require 'vue/404.php';
    $content = ob_get_clean();
    require 'default.php';
}