<html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
    <?php
        $contoller = Request::getInstance() -> controller;
        $method = Request::getInstance() -> controller;
        print rtrim($controller, "s");
        print "  " . $method . " done";
    ?>
    <!-- <?php $link = LINKPATH . 'students/index'; ?>
    <a href = "<?php print $link; ?>" > Students</a>
    <?php $link = LINKPATH . 'teachers/index'; ?>
    <a href = "<?php print $link; ?>" > Teachers</a> -->
</body>
