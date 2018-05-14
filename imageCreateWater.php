<?php
/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/4/12
 * Time: 上午11:55
 */

function createWater()
{
//    $filename = config('source_image');
//    $waterName = config('water_image');
    $filename = __DIR__.'/images/images.jpeg';
    $waterName = __DIR__.'/images/watermark.png';

    list($width_orig, $height_orig) = getimagesize($filename);
    list($width_water, $height_water) = getimagesize($waterName);
    $origin_water_width = $width_water;
    $origin_water_height = $height_water;

    while (($width_orig / $width_water) < 1 || ($height_orig / $height_water) < 1) {
        //水印等比例缩小
        $width_water = $width_water / 2;
        $height_water = $height_water / 2;
    }

    $image_s = imagecreatefrompng($waterName);
    $image = imagecreatefromjpeg($filename);

    $destX = $width_orig - $width_water;
    $destY = $height_orig - $height_water;

    imagecopyresampled($image, $image_s, $destX, $destY, 0, 0, $width_water, $height_water, $origin_water_width, $origin_water_height);
    header('Content-Type: image/jpeg');

    imagejpeg($image, null, 100);

    die;


}

function getWater()
{
    $path =  __DIR__.'/images/images.jpeg';
    $i=imagecreatefromjpeg($path);//测试图片，自己定义一个，注意路径
    for ($x=0;$x<imagesx($i);$x++) {
        for ($y=0;$y<imagesy($i);$y++) {
            $rgb = imagecolorat($i,$x,$y);
            $r=($rgb >>16) & 0xFF;
            $g=($rgb >> 8)& 0xFF;
            $b=$rgb & 0xFF;
            $rTotal += $r;
            $gTotal += $g;
            $bTotal += $b;
            $total++;
        }
    }
    $rAverage = round($rTotal/$total);
    $gAverage = round($gTotal/$total);
    $bAverage = round($bTotal/$total);

    header("Content-type: image/png");
    $string =  'test';
    $im     = imagecreatefrompng(__DIR__."/images/watermark.png");
    $orange = imagecolorallocate($im, $rAverage, $gAverage, $bAverage);
    $px     = (imagesx($im) - 7.5 * strlen($string)) / 2;

    imagestring($im, 3, $px, 9, $string, $orange);

    $im2 = imagecreatetruecolor(100, 100);
    imagecopyresized($im2, $im, 0, 0, 0, 0, 100, 100, imagesx($im), imagesy($im));

    imagepng($im2);
    imagedestroy($im2);


    imagecopyresampled($image, $im2, $destX, $destY, 0, 0, $width_water, $height_water, $origin_water_width, $origin_water_height);

}