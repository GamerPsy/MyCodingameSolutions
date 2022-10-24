<?php
fscanf(STDIN, "%s", $longitudeA); //longitude utilisateur
$longitudeA = strval($longitudeA);
$longitudeA = str_replace(",",".",$longitudeA);
$longitudeA = floatval($longitudeA);
$longitudeA = deg2rad($longitudeA);
fscanf(STDIN, "%s", $latitudeA); //latitude utilisateur
$latitudeA = strval($latitudeA);
$latitudeA = str_replace(",",".",$latitudeA);
$latitudeA = floatval($latitudeA);
$latitudeA = deg2rad($latitudeA);
fscanf(STDIN, "%d", $N); //nombre défibrillateurs
$listeDefib = [];
$distanceDefibPlusProche = 0;
$clefDefibPlusPoche = null;

function calculDistance($Long1, $Lat1, $long2, $lat2){
    $x = ($long2 - $Long1) * cos(($lat2 + $Lat1)/2);
    $y = ($lat2 - $Lat1);
    $d = (sqrt($x*$x + $y*$y)) * 6371;
    return $d;
}

for ($i = 0; $i < $N; $i++)
{
    $listeDefib[] = explode(';',stream_get_line(STDIN, 256 + 1, "\n"));
}

 foreach($listeDefib as $key=>$value){
    $longitudeB = strval($value[4]);
    $longitudeB = str_replace(",",".",$longitudeB);
    $longitudeB = floatval($longitudeB);
    $longitudeB = deg2rad($longitudeB);

    $latitudeB = strval($value[5]);
    $latitudeB = str_replace(",",".",$latitudeB);
    $latitudeB = floatval($latitudeB);
    $latitudeB = deg2rad($latitudeB);

    $listeDefib[$key]['nom'] = $listeDefib[$key][1];
    $listeDefib[$key]['dist'] = calculDistance($longitudeA,$latitudeA,$longitudeB,$latitudeB);
     
    if ($distanceDefibPlusProche === 0 || $distanceDefibPlusProche > $listeDefib[$key]['dist']) {
        $distanceDefibPlusProche = $listeDefib[$key]['dist'];
        $clefDefibPlusPoche = $key;
   }
 }
 echo $listeDefib[$clefDefibPlusPoche]['nom'], "\n";
?>