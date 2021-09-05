<?php
/*
  // PHP IMPROCS Library \\
dev: 		Bilal Onur Eskili
cont@ct:	onur@bilalonureskili.com

Includes:
Blur Effect => blurEf($url,$level)  ~ 05.09.2021
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
?>
