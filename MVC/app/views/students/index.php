<html>
<body>
    <?php $link = LINKPATH . 'students/create'; ?>
    <h1> Create </h1>
    <form method = "POST" action  = "<?php print $link; ?>" mehtod = "post">
    <label>name</label><input type ="text" name = "param[]"/><br />
    <label>city</label> <input type = "text" name = "param[]"/><br />
    <label>email</label> <input type = "text" name = "param[]"/><br />
    <label></label><input type = "submit" value =  "create"/>
    </form>

    <?php $link = LINKPATH . 'students/delete'; ?>
    <?php print $link; ?>
    <h1> Delete </h1>
    <form method = "POST" action  = "<?php print $link; ?>" mehtod = "post">
    <label>ID</label><input type ="text" name = "param[]"/><br />
    <label></label><input type = "submit" value =  "Delete"/>
    </form>

    <?php $link = LINKPATH . 'students/update'; ?>
    <h1> update </h1>
    <form method = "POST" action  = "<?php print $link; ?>" mehtod = "post">
    <label>ID</label><input type ="text" name = "param[]"/><br />
    <label>name</label><input type ="text" name = "param[]"/><br />
    <label>city</label> <input type = "text" name = "param[]"/><br />
    <label>email</label> <input type = "text" name = "param[]"/><br />
    <label></label><input type = "submit" value =  "update"/>
    </form>

    <?php $link = LINKPATH . 'students/read'; ?>
    <h1> Read </h1>
    <form method = "POST" action  = "<?php print $link; ?>" mehtod = "post">
    <label>ID</label><input type ="text" name = "param[]"/><br />
    <label></label><input type = "submit" value =  "Read"/>
    </form>
</body>
</html>
