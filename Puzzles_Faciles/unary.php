<?php
// un seul 0 correspond à la valeur 1
// deux 0 correspond à la valeur 0
// le deuxième bloc est égal à n*0 pour l'occurence des 0 ou 1 en chaine
// on a en fait 1 bloc de départ et une série de bloc
$MESSAGE = str_split(stream_get_line(STDIN, 100 + 1, "\n"));
$lettresDuMessage = "";
$oneORzero = "";
$solution = '';

//traduction de chaque caractère du message en binaire à 7 bits
for($i=0;$i<count($MESSAGE);$i++){
    $convert = decbin(ord($MESSAGE[$i]));
    $lettresDuMessage .= strrev(str_pad(strrev($convert), 7, '0'));
}

$codeBin = str_split($lettresDuMessage);

$chiffreAvant = "";
for($i=0;$i<count($codeBin);$i++){   
    $oneORzero = $codeBin[$i]=="1" ? "0" : "00";
    if($i==0){
        $solution = $oneORzero." 0";
        $chiffreAvant = $oneORzero;
    }
    else{
        if($chiffreAvant===$oneORzero){
               $solution .= "0";
        }
        else{
            $chiffreAvant = $oneORzero;
            $solution .= " " . $oneORzero. " 0";
        }
    }
}
echo $solution;
?>