<?php
/**
 *
 */
class Students extends Controller
{
    public $columnArray;
    function __construct()
    {
        $this ->  columnArray = array ('id', 'name', 'city', 'email');
    }
    public function index() {
        $user = $this -> model('StudentsModel');
        $user -> viewAll();
        $this -> view('students/index', []);
    }
    public function create()
    {
        $user = $this -> model('StudentsModel');
        $user -> create();
        // $this -> view('students/create', []);
    }
    public function read()
    {
        $user = $this -> model('StudentsModel');
        $user -> read($this ->  columnArray);
    }
    public function update()
    {
        $user = $this -> model('StudentsModel');
        $user -> update($this ->  columnArray);
    }
    public function delete()
    {
        $user = $this -> model('StudentsModel');
        $user -> delete();

    }
}
