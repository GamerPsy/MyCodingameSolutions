<?php
/**
 * Don't let the machines win. You are humanity's last hope...
 **/

// $largeur: the number of cells on the X axis
// $hauteur: the number of cells on the Y axis
fscanf(STDIN, "%d", $largeur);
fscanf(STDIN, "%d", $hauteur);
for ($i = 0; $i < $hauteur; $i++)
{
    $grille[] = str_split(stream_get_line(STDIN, 31 + 1, "\n"));// largeur characters, each either 0 or .
}

// Pour chaque nœud d'alimentation de la grille
for ($y = 0; $y < $hauteur; $y++) {
    for ($x = 0; $x < $largeur; $x++) {
      if ($grille[$y][$x] == '0') {
        // Trouver le premier nœud situé sur sa droite
        $noeud_a_droite = [-1, -1];
        for ($xx = $x + 1; $xx < $largeur; $xx++) {
          if ($grille[$y][$xx] == '0') {
            $noeud_a_droite = [$xx, $y];
            break;
          }
        }
  
        // Trouver le premier nœud situé sous lui
        $noeud_en_bas = [-1, -1];
        for ($yy = $y + 1; $yy < $hauteur; $yy++) {
          if ($grille[$yy][$x] == '0') {
            $noeud_en_bas = [$x, $yy];
            break;
          }
        }
  
        // Afficher les coordonnées du nœud, du voisin de droite, et du voisin situé en dessous
        echo "$x $y " . implode(' ', $noeud_a_droite) . ' ' . implode(' ', $noeud_en_bas) . "\n";
      }
    }
  }
  
  