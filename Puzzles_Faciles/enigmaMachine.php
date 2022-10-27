<?php
$operation = stream_get_line(STDIN, 256 + 1, "\n"); // ENCODE ou DECODE
fscanf(STDIN, "%d", $randomNumber); // nombre décalage

$rotors = [];
for ($i = 0; $i < 3; $i++)
{
    $rotor = stream_get_line(STDIN, 27 + 1, "\n");
    $rotors[] = $rotor;
}

$premierTour = str_split($rotors[0]);
$deuxiemeTour = str_split($rotors[1]);
$troisiemeTour = str_split($rotors[2]);
$message = stream_get_line(STDIN, 1024 + 1, "\n");


function cesarShift($operation, $word, $decalage){
    $alphabet = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $code = "";
    for($i=0;$i<strlen($word);$i++){
        $x = array_keys($alphabet, $word[$i]);
        $key = ($operation=="ENCODE") ? $x[0]+$decalage+$i : $x[0]-$decalage-$i;
        while( $key > 25 || $key<0 ){
            if($key>25){
                $key -= 26;
            } else{
                $key +=26;
            }
        }
        $code .= $alphabet[$key];
    }

    return $code;
}

function rotor($message, $operation, $rotor){
    $alphabet = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $code = "";
    for($i=0;$i<strlen($message);$i++){
        $key = ($operation=="ENCODE") ? array_keys($alphabet, $message[$i]) : array_keys($rotor, $message[$i]);
        $code .= ($operation=="ENCODE") ? $rotor[$key[0]] : $alphabet[$key[0]];
    }

    return $code;
}


if ($operation=="ENCODE"){
    $prems = cesarShift($operation, $message, $randomNumber);
    $secon = rotor($prems, $operation, $premierTour);
    $trois = rotor($secon, $operation, $deuxiemeTour);
    $quatr = rotor($trois, $operation, $troisiemeTour);
    
    echo $quatr;
} else {
    $prems = rotor($message, $operation, $troisiemeTour);
    $secon = rotor($prems, $operation, $deuxiemeTour);
    $trois = rotor($secon, $operation, $premierTour);
    $quatr = cesarShift($operation, $trois, $randomNumber);
    echo $quatr;
}


?>