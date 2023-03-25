<?php
/*
     PHP IMPROCS Library

dev:      Bilal Onur Eskili
cont@ct:  onur@bilalonureskili.com

Includes:
Blur Effect => blurEf($url,$level)  ~ 05.09.2021
Horizontal Edge Detection =>  horizontalEdge($url) ~ 06.09.2021
Vertical Edge Detection => verticalEdge($url) ~ 06.09.2021
Laplacian Edge (Outline) => laplacianEdge($url) ~ 06.09.2021
Gray Scale => grayscale($url) ~ 24.03.2023
Resize => resize($url, $width, $height) ~ 24.03.2023
Brightness Adjustment => brightness($url, $level) ~ 24.03.2023
*/

function blurEf($url,$level) {
$image = imagecreatefrompng($url);
if ($level > 1){
for ($i = 1; $i <= $level; $i++) {
$emboss = array(array(0.0625, 0.125, 0.0625), array(0.125, 0.25, 0.125), array(0.0625, 0.125, 0.0625));
imageconvolution($image, $emboss, 1, 0);
}
}
header('Content-Type: image/png');
imagepng($image, null, 9);
}

function horizontalEdge($url) {
$image = imagecreatefrompng($url);
for ($i = 1; $i <= 2; $i++) {
$emboss = array(array(1, 1, 1), array(0, 0, 0), array(-1, -1, -1));
imageconvolution($image, $emboss, 1, 0);
}
header('Content-Type: image/png');
imagepng($image, null, 9);
}

function verticalEdge($url) {
$image = imagecreatefrompng($url);
for ($i = 1; $i <= 2; $i++) {
$emboss = array(array(1, 0, -1), array(1, 0, -1), array(1, 0, -1));
imageconvolution($image, $emboss, 1, 0);
}
header('Content-Type: image/png');
imagepng($image, null, 9);
}

function laplacianEdge($url) {
$image = imagecreatefrompng($url);
for ($i = 1; $i <= 2; $i++) {
$emboss = array(array(-1, -1, -1), array(-1, 8, -1), array(-1, -1, -1));
imageconvolution($image, $emboss, 1, 0);
}
header('Content-Type: image/png');
imagepng($image, null, 9);
}

function grayscale($url) {
    $image = imagecreatefrompng($url);
    imagefilter($image, IMG_FILTER_GRAYSCALE);
    header('Content-Type: image/png');
    imagepng($image, null, 9);
}

function resize($url, $w, $h) {
  #https://stackoverflow.com/a/14649689
  $image = imagecreatefrompng($url);
  list($width, $height) = getimagesize($url);
  $r = $width / $height;
  if ($w/$h > $r) {
      $newwidth = $h*$r;
      $newheight = $h;
  } else {
      $newheight = $w/$r;
      $newwidth = $w;
  }
  $dst = imagecreatetruecolor($newwidth, $newheight);
  imagecopyresampled($dst, $image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

  header('Content-Type: image/png');
  imagepng($dst, null, 9);

}

function brightness($url, $level) {
    $image = imagecreatefrompng($url);
    imagefilter($image, IMG_FILTER_BRIGHTNESS, $level);
    header('Content-Type: image/png');
    imagepng($image, null, 9);
}


?>
