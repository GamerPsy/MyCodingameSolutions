<?php
fscanf(STDIN, "%d %d", $W, $H); // Building Width et Height
fscanf(STDIN, "%d", $N); // $N: maximum number of turns before game over.
fscanf(STDIN, "%d %d", $X0, $Y0); // Position de départ
$Hmin = 0;
$Wmin = 0;
// game loop
while (TRUE)
{
    // $bombDir: the direction of the bombs from batman's current location (U, UR, R, DR, D, DL, L or UL)
    fscanf(STDIN, "%s", $bombDir);
    $bombDir = str_split($bombDir);

    if(in_array("U",$bombDir)){
        $H = $Y0;
        $Y0 = floor(($Y0+$Hmin)/2);
    }
    if(in_array("D",$bombDir)){
        $Hmin = $Y0;
        $Y0 = floor(($Y0+$H)/2); 
    }
    if(in_array("L",$bombDir)){
        $W = $X0;
        $X0 = floor(($X0 + $Wmin)/2); 
    }
    if(in_array("R",$bombDir)){
        $Wmin = $X0;
        $X0 = floor(($X0 + $W)/2);     
    }

    echo $X0 . " " . $Y0 . "\n";
}
?>