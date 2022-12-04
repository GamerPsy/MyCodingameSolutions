<?php
$winAgain = [
    "R" => ["C", "L"],
    "P" => ["S", "R"],
    "C" => ["L", "P"],
    "L" => ["S", "P"],
    "S" => ["R", "C"]
];
$joueurs = [];
fscanf(STDIN, "%d", $N);

for ($i = 0; $i < $N; $i++) {
    fscanf(STDIN, "%d %s", $NUMPLAYER, $SIGNPLAYER);
    $joueurs[] = ["sign" => $SIGNPLAYER, "number" => $NUMPLAYER, "opponents" => []];
}

//faire un duel
function gagnantMatch($rules, $joueur1, $joueur2)
{
    global $joueurs;
    $signPlayerOne = $joueur1['sign'];
    $signPlayerTwo = $joueur2['sign'];
    $signlooserWithPlayerOne = $rules[$signPlayerOne];
    
    if ($signPlayerOne !== $signPlayerTwo) {
        $winner = (in_array($signPlayerTwo, $signlooserWithPlayerOne)) ? $joueur1 : $joueur2;
    } else {
        $winner = ($joueur1['number'] > $joueur2['number']) ? $joueur2 : $joueur1;
    }
    return $winner;
}

//la boucle de jeu tournoi
do{
    $gagnants =[];
    for($i=0;$i<count($joueurs)-1;$i+=2){   
            $joueurs[$i]["opponents"][] = $joueurs[$i+1]["number"];
            $joueurs[$i+1]["opponents"][] = $joueurs[$i]["number"];  
            $gagnants[]=gagnantMatch($winAgain, $joueurs[$i], $joueurs[$i+1]);
    }  
    $joueurs = $gagnants;
}
while(count($joueurs) > 1);

echo $joueurs[0]["number"] . "\n";
echo implode(" ", $joueurs[0]["opponents"]);