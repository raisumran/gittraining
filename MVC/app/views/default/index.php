<html>
<?php require_once(ABSPATH . 'app/views/header.php'); ?>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
    <?php
        $controller = Request::getInstance() -> controller;
        $method = Request::getInstance() -> method;
        print rtrim($controller, "s");
        print "  " . $method . " done";
    ?>
</body>
