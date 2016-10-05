<?php
spl_autoload_register(function($class_name){
    // echo $class_name. "<br>";
    $file = 'controllers/' . $class_name . '.php';
    if (file_exists(ABSPATH . 'app/' . $file))  {
        include ( $file);
    } else if (substr($class_name, -5) == 'Model' && strlen($class_name)> 5) {
            $file = 'models/' . $class_name . '.php';
            if (file_exists( ABSPATH . 'app/' . $file)){
                include $file;
            }
    } else if (strpos($class_name, 'index') !== false) {
        $file = 'views/' . $class_name . '.php';
        if (file_exists( ABSPATH . 'app/' . $file)){
            include $file;
        }
    } else {
        $file = 'core/' . $class_name . '.php';
        if (file_exists(ABSPATH . 'app/' . $file))  {
            include ( $file);
        }
    }
    // $file = 'core/' . $class_name . '.php';
    // if (file_exists(ABSPATH . 'app/' . $file))  {
    //     include ( $file);
    // } else {
    //     $file = 'models/' . $class_name . '.php';
    //     if (file_exists( ABSPATH . 'app/' . $file)){
    //         include $file;
    //     } else {
    //         $file = 'views/' . $class_name . '.php';
    //         if (file_exists( ABSPATH . 'app/' . $file)){
    //             include $file;
    //         } else {
    //             $file = 'controllers/' . $class_name . '.php';
    //             include $file;
    //         }
    //     }
    // }
});
