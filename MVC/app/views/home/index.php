<html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <!-- <script>$(function() { alert('hello') })</script> -->
</head>
<body>
    <div id="textDiv"></div>
    <script type="text/javascript">
        var div = document.getElementById("textDiv");
        div.textContent = "Welcome ..! click login to continue...!";
        var text = div.textContent;
    </script>
    <a href = 'http://localhost/PHP/MVC/public/login/logIn'>Login</a>
</body>
