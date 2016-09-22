<?php
class Home extends Controller
{
    public function index($name = '', $othername = '') {
        echo " home index <br>";
        echo $name. ' '. $othername;

    }
}
?>
