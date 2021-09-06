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


?>
