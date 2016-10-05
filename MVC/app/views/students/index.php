<html>
<body>
    <?php
    foreach ($GLOBALS as $val) {
        echo "ID: $val->id" . "</br>";
        echo "Name: $val->name" . "</br>";
        echo "city: $val->city " . "</br>";
        echo "email: $val->email" . "</br>";
        echo "<br> <br>";
    }
    ?>
    <?php $link = LINKPATH . 'students/create'; ?>
    <h1> Create </h1>
    <form method = "POST" action  = "<?php print $link; ?>" mehtod = "post">
    <label>name</label><input type ="text" name = "param[]"/><br />
    <label>city</label> <input type = "text" name = "param[]"/><br />
    <label>email</label> <input type = "text" name = "param[]"/><br />
    <label></label><input type = "submit" value =  "create"/>
    </form>

    <?php $link = LINKPATH . 'students/delete'; ?>
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
