<?php
function doImages($img, $name) {
	$fileloc="C:\\wamp\\www\\electura_final\\";
  $pdf = "C:\\wamp\\www\\electura_final\\".$img.'[0]';
	/*
	$image = new Imagick();
$image->setResolution(200,200);
$image->readImage($pdf);
$num=$image->getNumberImages();
echo $num;
for($i=0;$i<$num;$i++) {

$fileloc="C:\\wamp\\www\\semester1\\";
  $pdf2 = "C:\\wamp\\www\\semester1\\".$img.'['.$i.']';
  
 $image2 = new Imagick();
$image2->setResolution(200,200);
$image2->readImage($pdf2);
$image2->setImageFormat( "png" );
$image2->trimImage(0.01);
$image2->writeImage('C:\\wamp\\www\\semester1\\test33\\'.$name.$i.'.png');

}
$fileloc="C:\\wamp\\www\\semester1\\";
  $pdf = "C:\\wamp\\www\\semester1\\".$img.'[0]';
  */
  
  $image3 = new Imagick();
$image3->setResolution(200,200);
$image3->readImage($pdf);
$image3->thumbnailImage(60, 80,true);
$image3->writeImage('C:\\wamp\\www\\electura_final\\fileThumb\\'.$name.'-thumb.png');

}

 //$thumbnail = $image->getImageBlob();
//echo "<img src=C:\wamp\www\pdfAsImage.png;base64,".base64_encode($thumbnail)."' /><br />";

