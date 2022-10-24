<?php

// $lightX: the X position of the light of power
// $lightY: the Y position of the light of power
// $initialTx: Thor's starting X position
// $initialTy: Thor's starting Y position
fscanf(STDIN, "%d %d %d %d", $lightX, $lightY, $initialTx, $initialTy);

// game loop
while (TRUE)
{
    // $remainingTurns: The remaining amount of turns Thor can move. Do not remove this line.
    fscanf(STDIN, "%d", $remainingTurns);

    $solution = '';

    //sensX et nbDeplacementX
    $sensX = '';
    $nbDeplacementX = 0;
    if($lightX > $initialTx){
        $sensX = 'E';
        $nbDeplacementX = $lightX - $initialTx;
    } elseif($lightX < $initialTx){
        $sensX = 'W';
        $nbDeplacementX = $initialTx - $lightX;
    }

    //sensY et nbDeplacementY
    $sensY = '';
    $nbDeplacementY = 0;
    if($lightY > $initialTy){
        $sensY = 'S';
        $nbDeplacementY = $lightY - $initialTy;
    } elseif($lightY < $initialTy){
        $sensY = 'N';
        $nbDeplacementY = $initialTy - $lightY;
    }

    //calcul diagonales
    $nbDiagonale = 0;
    $restant = 0;
    if($nbDeplacementY < $nbDeplacementX){
        $nbDiagonale = $nbDeplacementY;
        $restant = $nbDeplacementX - $nbDeplacementY;
    } elseif($nbDeplacementY > $nbDeplacementX){
        $nbDiagonale = $nbDeplacementX;
        $restant = $nbDeplacementY - $nbDeplacementX;
    }

    if($nbDiagonale > 0){
        for($i=0; $i < $nbDiagonale; $i++){
            $solution .= $sensY.$sensX."\n";
        }
        if($restant > $nbDeplacementY){
            $nbDeplacementY -= $restant;
        }
        if($restant > $nbDeplacementX){
            $nbDeplacementX -= $restant;
        }     
    } 
        for($i=0; $i < $nbDeplacementX; $i++){
            $solution .= $sensX."\n";
        }
        for($i=0; $i < $nbDeplacementY; $i++){
            $solution .= $sensY."\n";   
    }
    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug: error_log(var_export($var, true)); (equivalent to var_dump)
echo($solution);
}
?>