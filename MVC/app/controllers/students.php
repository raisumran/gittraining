<?php
/**
 *
 */
class Students extends Controller
{


    function __construct()
    {

    }
    public function index() {
        $user = $this -> model('StudentsModel');
        $user -> table = 'student';
        echo $user -> table;
        $this -> view('students/index', []);
    }
    public function create()
    {
        $user = $this -> model('StudentsModel');
        $user -> table = 'student';
        $user -> create();
        // $this -> view('students/create', []);

    }
    public function read()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
}
