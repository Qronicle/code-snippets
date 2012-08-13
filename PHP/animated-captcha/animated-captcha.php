<?php

/**
 * Create animated GIF showing "ABCD"
 */

$string = "ABCD";

for ($i = 0; $i < strlen($string); $i++) {
    $img = imagecreate(46, 25);
    $bgColor = imagecolorallocate($img, 0, 0, 0);
    $fgColor = imagecolorallocate($img, 255, 255, 0);
    imagestring($img, 100, 5, 5, str_repeat(' ', $i) . $string[$i], $fgColor);
    imagegif($img, 'gif/img-'.str_pad($i, 3, '0', STR_PAD_LEFT).'.gif');
    imagedestroy($img);
}

$lol = exec("/usr/bin/convert -adjoin -loop 0 -delay 40 gif/*.gif test.gif &", $out);

?>

<img src="test.gif" />