<?php
spl_autoload_register(function($class_name){
    $file = 'core/' . $class_name . '.php';
    if (file_exists("/var/www/html/PHP/MVC/app/" . $file))  {
        include ( $file);
    } else {
        $file = 'models/' . $class_name . '.php';
        if (file_exists( "/var/www/html/PHP/MVC/app/" . $file)){
            include $file;
        } else {
            $file = 'views/' . $class_name . '.php';
            if (file_exists( "/var/www/html/PHP/MVC/app/" . $file)){
                include $file;
            } else {
                $file = 'controllers/' . $class_name . '.php';
                include $file;
            }
        }
    }
});
// spl_autoload_register( function ($classname) {
//     // $classname = str_replace( __NAMESPACE__.'\\', '/', $classname );
//     include 'core/' . $classname.'.php';
// });

// require_once("core/app.php");
// require_once("core/controller.php");
// require_once("core/model.php");
// require_once("core/database.php");
// require_once("core/Session.php");
