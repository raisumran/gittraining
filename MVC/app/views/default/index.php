<html>
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
    <!-- <?php $link = LINKPATH . 'students/index'; ?>
    <a href = "<?php print $link; ?>" > Students</a>
    <?php $link = LINKPATH . 'teachers/index'; ?>
    <a href = "<?php print $link; ?>" > Teachers</a> -->
</body>
