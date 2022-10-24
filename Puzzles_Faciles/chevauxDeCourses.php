<?php
$ecartPuissance = 0;
$puissancesChevaux = [];
fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++)
{
   fscanf(STDIN, "%d", $pi);
   $puissancesChevaux[]= $pi;
}
sort($puissancesChevaux);

$ecartPuissance = 10000000;
$precedentCheval = $puissancesChevaux[0];
for($i=1;$i<count($puissancesChevaux);$i++){
    $calcul = $precedentCheval<$puissancesChevaux[$i] ? $puissancesChevaux[$i]-$precedentCheval : $precedentCheval-$puissancesChevaux[$i];
    if($calcul<$ecartPuissance){
        $ecartPuissance = $calcul;
    }
    $precedentCheval = $puissancesChevaux[$i];
}

echo $ecartPuissance;
?>