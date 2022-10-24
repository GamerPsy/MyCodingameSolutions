<?php
fscanf(STDIN, "%d", $N);// $N: Number of elements which make up the association table.
fscanf(STDIN, "%d", $Q);// $Q: Number Q of file names to be analyzed.

$mimeTypeArray = [];
for ($i = 0; $i < $N; $i++) //création tableau correspondance $mimeTypeArray
{
    fscanf(STDIN, "%s %s", $EXT, $MT);
    $mimeTypeArray[strtolower($EXT)] = $MT;
}

function decoupeFormatFichier($nomFichierComplet){
    if(strpos($nomFichierComplet, ".") !== false){
        $toCut = strrev($nomFichierComplet);
        $toCut = strstr($toCut, ".");
        $toCut = strrev($toCut);
        $extension = substr($nomFichierComplet, strlen($toCut));
        return $extension;
    }
}

for ($i = 0; $i < $Q; $i++)
{
    $fichier = stream_get_line(STDIN, 256 + 1, "\n");
    $format = strtolower(decoupeFormatFichier($fichier));
    if(array_key_exists($format,$mimeTypeArray)){
        echo $mimeTypeArray[$format]."\n";
    }else{
        echo "UNKNOWN"."\n";
    }
}
?>