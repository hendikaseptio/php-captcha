<?php 

session_start();

$width = 130;
$height = 60;

$img = imagecreatetruecolor($width, $height);

$black = imagecolorallocate($img, 0,0,0);
$white = imagecolorallocate($img, 255,255,255);
$grey = imagecolorallocate($img, 100,100,100);

imagefill($img, 0,0, $white);

$characters = array_merge(range(0,9), range('A', 'Z'));

$_SESSION['captcha'] = "";

for ($i=0; $i < 4; $i++) { 
    $x = $i*15+$width/3.5;
    $y = rand($height/2-15, $height/2);
    $selected_char = $characters[rand(0, count($characters)-1)];
    imagestring($img, 10, $x, $y, $selected_char, $black);
    imageline($img, 0, rand()%$height, $width, rand()%$height, $grey);
    $_SESSION['captcha'] .= $selected_char;
}

for ($i=0; $i < 150; $i++) {
    imagesetpixel($img, rand()%$width, rand()%$height, $grey);
}

header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);