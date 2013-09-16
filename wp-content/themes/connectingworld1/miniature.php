<?php
// éditez les 2 variables ci-dessous en fonction du résultat souhaité :
$largeur = "100"; // correspond à la largeur de l'image souhaitée
$hauteur ="100"; // correspond à la hauteur de l'image souhaitée

// et voici la création de la miniature...
header("Content-Type: image/jpeg");
$img_in = imagecreatefromjpeg($pic);
$img_out = imagecreatetruecolor($largeur, $hauteur);
imagecopyresampled($img_out, $img_in, 0, 0, 0, 0, imagesx($img_out), imagesy($img_out), imagesx($img_in), imagesy($img_in));
$t = imagejpeg($img_out);
echo $t;
?>