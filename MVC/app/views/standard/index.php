<html>

<?php require_once(ABSPATH . 'app/views/header.php'); ?>

<body>
    <?php
        for($i = 0; $i < count($lists[1]); $i++){
            for($j = 0; $j < count($lists[0]); $j++){
                echo $lists[0][$j] . " => " . $lists[1][$i][$j] . "<br>";
            }
            echo "<br> <br>";
        }
    $link = LINKPATH . Request::getInstance() -> controller.'/create'; ?>

    <!-- Create Method Impelementation -->

    <h1> Create </h1>
    <form method = "POST" action  = "<?php print $link; ?>" mehtod = "POST">
    <?php
        for($i = 0; $i < count($lists[0]); $i++){
            if($lists[0][$i] != 'id') {
                echo '<label>';
                echo $lists[0][$i];
                echo '</label>';
                echo '<input type ='. "text". 'name = '. "param[]" . '/><br />';
            }
        }
    ?>
    <label></label><input type = "submit" value =  "create"/>
    </form>

    <!-- Update Method Implementation -->

    <h1> Update </h1>
    <form method = "POST" action  = "<?php print $link; ?>" mehtod = "post">
    <?php
        for($i = 0; $i < count($lists[0]); $i++){
            echo '<label>';
            echo $lists[0][$i];
            echo '</label>';
            echo '<input type ='. "text". 'name = '. "param[]" . '/><br />';
        }
    ?>
    <label></label><input type = "submit" value =  "update"/>
    </form>

    <?php $link = LINKPATH . Request::getInstance() -> controller.'/delete'; ?>
    <h1> Delete </h1>
    <form method = "POST" action  = "<?php print $link; ?>" mehtod = "post">
    <label>ID</label><input type ="text" name = "param[]"/><br />
    <label></label><input type = "submit" value =  "Delete"/>
    </form>

    <?php $link = LINKPATH . Request::getInstance() -> controller.'/read'; ?>
    <h1> Read </h1>
    <form method = "POST" action  = "<?php print $link; ?>" mehtod = "post">
    <label>ID</label><input type ="text" name = "param[]"/><br />
    <label></label><input type = "submit" value =  "Read"/>
    </form>
</body>
</html>
