<html>
<?php $link = LINKPATH . 'login/run'; ?>
<h1> Login</h1>
<form method = "POST" action  = "<?php print $link; ?>" mehtod = "post">
<label>Name</label><input type ="text" name = "Name"/><br />
<label>City</label> <input type = "text" name = "city"/><br />
<label>email</label> <input type = "text" name = "email"/><br />
<label></label><input type = "submit"/>
</form>
