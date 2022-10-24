<?php

fscanf(STDIN, "%d", $L); // Largeur d'une lettre
fscanf(STDIN, "%d", $H); // Hauteur d'une lettre
$T = strtoupper(stream_get_line(STDIN, 256 + 1, "\n")); //ce qu'il faut ressortir en ascii
$alphabetASCII = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ?"); // Tableau alphabet

for ($i = 0; $i < $H; $i++)
{
    $ROW[] = stream_get_line(STDIN, 1024 + 1, "\n");
}

//Création tableau de chaque lettre en ASCII
$tableauAscii = [];
foreach($ROW as $ligne){
    $tableauAscii[] = str_split($ligne, $L);
}

$solution = [];
for($i=0;$i<$H;$i++)
{
    //boucle sur le nb lettre du mot
    for($z=0;$z<strlen($T);$z++){
        if(!in_array($T[$z], $alphabetASCII)) //si le caractère pas dans l'alphabet
        {
            $clef = 26;
        } else{
            $clef=array_search($T[$z], $alphabetASCII); //$T doit correspondre à l'index de la lettre du mot
        }
        
        $solution[$i] .= $tableauAscii[$i][$clef];
    }
    
}

//On gère la sortie pour une
for($i=0;$i<count($solution);$i++)
{
    echo $solution[$i]."\n";
}
?>