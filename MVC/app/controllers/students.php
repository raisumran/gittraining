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
        $user -> dbCall($this ->  columnArray, True);
        $this -> view('students/index', []);
    }
    public function create()
    {
        $user = $this -> model('StudentsModel');
        $user -> dbCall($this ->  columnArray, False);
        // $this -> view('students/create', []);
    }
    public function read()
    {
        $user = $this -> model('StudentsModel');
        $user -> dbCall($this ->  columnArray, True);
    }
    public function update()
    {
        $user = $this -> model('StudentsModel');
        $user -> dbCall($this ->  columnArray, False);
    }
    public function delete()
    {
        $user = $this -> model('StudentsModel');
        $user -> dbCall($this ->  columnArray, False);

    }
}
