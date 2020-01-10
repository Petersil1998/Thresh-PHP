<?php

function my_autoload($class_name){
    $file = __DIR__.'\\'.$class_name.'.php';
    if(file_exists($file))
    {
        require_once($file);
    }
}

spl_autoload_register('my_autoload');