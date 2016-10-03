<!-- <html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <!-- <script>$(function() { alert('hello') })</script> -->
</head>
<body>
    <!-- <?php $link = LINKPATH . 'students/create'; ?>
    <a href = "<?php print $link; ?>" > Create</a> -->
    <?php $link = LINKPATH . 'students/update'; ?>
    <a href = "<?php print $link; ?>" > Update</a>
    <?php $link = LINKPATH . 'students/read'; ?>
    <a href = "<?php print $link; ?>" > Read</a>
    <?php $link = LINKPATH . 'students/delete'; ?>
    <a href = "<?php print $link; ?>" > Delete</a>
    <!-- <a href = 'http://localhost/PHP/MVC/public/students/create'>Create</a>
    <a href = 'http://localhost/PHP/MVC/public/students/update'>Update</a>
    <a href = 'http://localhost/PHP/MVC/public/students/create'>Delete</a>
    <a href = 'http://localhost/PHP/MVC/public/students/read'>Read</a> -->
</body> -->
<html>
<?php $link = LINKPATH . 'students/create'; ?>
<h1> Login</h1>
<form method = "POST" action  = "<?php print $link; ?>" mehtod = "post">
<label>name</label><input type ="text" name = "name"/><br />
<label>city</label> <input type = "text" name = "city"/><br />
<label>email</label> <input type = "text" name = "email"/><br />
<label></label><input type = "submit" value =  "create"/>
</form>
