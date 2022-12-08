<?php
/**
 * Don't let the machines win. You are humanity's last hope...
 **/

// $width: the number of cells on the X axis
fscanf(STDIN, "%d", $width);
// $height: the number of cells on the Y axis
fscanf(STDIN, "%d", $height);
for ($i = 0; $i < $height; $i++)
{
    $line = stream_get_line(STDIN, 31 + 1, "\n");// width characters, each either 0 or .
}

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)


// Three coordinates: a node, its right neighbor, its bottom neighbor
echo("0 0 1 0 0 1\n");
?>