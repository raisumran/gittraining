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
        $this -> view('students/index', []);
    }
    public function create()
    {
        $user = $this -> model('StudentsModel');
        $user -> table = 'students';
        $user -> column =  3;
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
