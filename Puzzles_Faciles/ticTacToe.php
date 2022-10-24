<?php
for ($i = 0; $i < 3; $i++)
{
    $line[] = stream_get_line(STDIN, 3 + 1, "\n");
}

$sortie = implode("",$line);
$combinaisonsPossibles = [
    "ligne1" => $sortie[0] . $sortie[1] . $sortie[2],
    "ligne2" => $sortie[3] . $sortie[4] . $sortie[5],
    "ligne3" => $sortie[6] . $sortie[7] . $sortie[8],
    "colonne1" => $sortie[0] . $sortie[3] . $sortie[6],
    "colonne2" => $sortie[1] . $sortie[4] . $sortie[7],
    "colonne3" => $sortie[2] . $sortie[5] . $sortie[8],
    "diagonale1" => $sortie[0] . $sortie[4] . $sortie[8],
    "diagonale2" => $sortie[2] . $sortie[4] . $sortie[6],
];
  
function checkIf2O($string){
    $nombreDeLettreO =  substr_count($string, "O");
    $win = $nombreDeLettreO===2 ? true : false;
    return $win;
}

function checkIfEmpty($string){
    $check =  substr_count($string, ".");
    $win = $check===1 ? true : false;
    return $win;
}

function afficheGrille($tableauDepart){
    for($i = 0; $i < 3; $i++){
        echo $tableauDepart[$i] . "\n";
    }
}

$gagne = false;
foreach($combinaisonsPossibles as $type=>$valeur){
    if(checkIf2O($valeur)==2   && checkIfEmpty($valeur)){
        $gagne = true;
        switch ($type){
            case "ligne1": 
                $line[0] = "OOO";
                afficheGrille($line);
                break;
            case "ligne2": 
                $line[1] = "OOO";
                afficheGrille($line);
                break;
            case "ligne3": 
                $line[2] = "OOO";
                afficheGrille($line);
                break;
            case "colonne1": 
                $line[0][0] = "O";
                $line[1][0] = "O";
                $line[2][0] = "O";
                afficheGrille($line);
                break;
            case "colonne2": 
                $line[0][1] = "O";
                $line[1][1] = "O";
                $line[2][1] = "O";;
                afficheGrille($line);
                break;
            case "colonne3": 
                $line[0][2] = "O";
                $line[1][2] = "O";
                $line[2][2] = "O";
                afficheGrille($line);
                break;
            case "diagonale1": 
                $line[0][0] = "O";
                $line[1][1] = "O";
                $line[2][2] = "O";
                afficheGrille($line);
                break;
            case "diagonale2": 
                $line[0][2] = "O";
                $line[1][1] = "O";
                $line[2][0] = "O";
                afficheGrille($line);
                break;
            default :
                break;
        } 
    } 
}
if($gagne !== true){
    echo "false";
}
?>