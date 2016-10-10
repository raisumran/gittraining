<?php

spl_autoload_register(function($class_name){
    $arr_filenames = array('home', 'students', 'teachers', 'App', 'Config', 'Controller',
                            'ControllerFactory', 'Database', 'DBquery', 'Model',
                            'ModelFactory', 'Request', 'ViewManager', 'StudentsModel',
                            'TeachersModel', 'Query');
    $arr_filepaths = array('controllers/home.php', 'controllers/students.php', 'controllers/teachers.php', 'core/App.php', 'core/Config.php', 'core/Controller.php',
                        'core/ControllerFactory.php', 'core/Database.php', 'core/DBquery.php', 'core/Model.php',
                        'core/ModelFactory.php', 'core/Request.php', 'core/ViewManager.php', 'models/StudentsModel.php',
                        'models/TeachersModel.php', 'core/Query.php');
    $i;
    for($i = 0; $i < count($arr_filenames); $i++) {
        if($class_name == $arr_filenames[$i]){
                break;
        }
    }
    include ( $arr_filepaths[$i]);
});
