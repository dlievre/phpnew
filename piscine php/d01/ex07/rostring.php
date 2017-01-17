#!/usr/bin/php
<?php
    if ($argv[1] != NULL)
    {
        $decoupe = explode(' ', $argv[1]);
        print_r($decoupe);
        foreach (array_slice($decoupe, 1) as $word)
        {
            echo "$word" . " ";
        }
        echo $decoupe[0] . "\n";
    }
?>