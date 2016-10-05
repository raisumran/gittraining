<html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <!-- <script>$(function() { alert('hello') })</script> -->
</head>
<body>
    <?php $link = LINKPATH . 'students/index'; ?>
    <a href = "<?php print $link; ?>" > Students</a>
    <?php $link = LINKPATH . 'teachers/index'; ?>
    <a href = "<?php print $link; ?>" > Teachers</a>
</body>
