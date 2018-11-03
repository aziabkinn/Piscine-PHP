<?php
    if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] != 'OK')
    {
        echo "ERROR\n";
    }
    else
    {
        if (!file_exists('../private/'))
        {   
            mkdir('../private');
        }
        if (!file_exists('../private/passwd'))
        {
            file_put_contents('../private/passwd', null);
        }
        $arr = unserialize(file_get_contents('../private/passwd'));
        $stop = false;
        foreach($arr as $user)
        {
            if ($user["login"] == $_POST["login"])
            {
                $stop = true;
                echo("ERROR\n");
            }
        }
        if (!$stop)
        {
            $user["login"] = $_POST["login"];
            $arr_temp["passwd"] = hash(whirlpool, $_POST["passwd"]);
            $arr[] = $user;
            file_put_contents("../private/passwd", serialize($arr));
            echo("OK\n");
        }    
    }
?>
