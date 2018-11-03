#!/usr/bin/php
<?php
if ($argc > 2)
{
    $i = 2;
    while ($i < $argc)
    {
        $str .= $argv[$i];
        if ($i + 1 != $argc)
            $str .= "&";
        $i++;
    }
    $str = str_replace(":", "=", $str);
    parse_str($str, $output);
    if (array_key_exists($argv[1], $output))
    {
        $result = $output[$argv[1]];
        echo($result);
        echo("\n");
    }
}
?>
