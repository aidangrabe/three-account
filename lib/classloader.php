<?php

function classloader($c) {
    $class = $c . ".php";
    require $class;
}

spl_autoload_register("classloader");

?>
