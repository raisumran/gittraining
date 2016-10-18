<?php
/**
 * [Loads files for all of the application]
 */

spl_autoload_register(function($class_name){
    /**
     * [registry of all the files of application]
     * @var array
     */

    $fileCheck = array(
        "home" => "controllers/home.php",
        "students" => "controllers/students.php",
        "teachers" => "controllers/teachers.php",
        "courses" => "controllers/courses.php",
        "courses" => "controllers/courses.php",
        "App" => "../core/App.php",
        "Config" => "../core/Config.php",
        "Controller" => "../core/Controller.php",
        "ControllerFactory" => "../core/ControllerFactory.php",
        "Database" => "../core/Database.php",
        "DBquery" => "../core/DBquery.php",
        "Query" => "../core/Query.php",
        "Model" => "../core/Model.php",
        "ModelFactory" => "../core/ModelFactory.php",
        "Request" => "../core/Request.php",
        "ViewManager" => "../core/ViewManager.php",
        "StudentsModel" => "models/StudentsModel.php",
        "TeachersModel" => "models/TeachersModel.php",
        "CoursesModel" => "models/CoursesModel.php"
    );
    include_once( $fileCheck[$class_name]);
});
