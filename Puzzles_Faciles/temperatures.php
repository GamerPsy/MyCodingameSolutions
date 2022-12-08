<?php
// $n: the number of temperatures to analyse
fscanf(STDIN, "%d", $n);
$inputs = explode(" ", fgets(STDIN));
$tabPos = [];
$tabNeg = [];

for ($i = 0; $i < $n; $i++)
{
    $t = intval($inputs[$i]); // a temperature expressed as an integer ranging from -273 to 5526
    if($t < 0){
        $tabNeg[] = $t;
    }
    if($t > 0){
        $tabPos[] = $t;
    }
}
arsort($tabNeg);
asort($tabPos);
if(count($tabPos) == 0 && count($tabNeg) == 0){
    echo ('0');
}
else{
    if(count($tabPos) != 0 && count($tabNeg) != 0){
    if($tabPos[array_key_first($tabPos)]==abs($tabNeg[array_key_first($tabNeg)])){
    echo $tabPos[array_key_first($tabPos)];
    }
    if($tabPos[array_key_first($tabPos)] > abs($tabNeg[array_key_first($tabNeg)])){
    echo $tabNeg[array_key_first($tabNeg)];
    } 
    if($tabPos[array_key_first($tabPos)] < abs($tabNeg[array_key_first($tabNeg)])){
    echo $tabPos[array_key_first($tabPos)];
    }
} elseif(count($tabPos) == 0){
    echo $tabNeg[array_key_first($tabNeg)];
} elseif(count($tabNeg) == 0){
    echo $tabPos[array_key_first($tabPos)];
}
}
