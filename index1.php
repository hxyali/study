<?php
function p ($arr)
{
    echo '<pre>'.print_r($arr,true).'</pre>';
}
//$yac = new Yac();
//
//$key = "dummy";
//$value = "foo";
//var_dump($yac->add($key, $value)); // true
//var_dump($yac->add($key, $value)); // false
//var_dump($yac->set($key, $value)); // true
//var_dump($yac->get($key));		   // foo
//var_dump($yac->delete($key));      // true
//die;




//$yac = new Yac();
//
//$ret = $yac->set('t',234);
//var_dump($yac->get('t'));die;
////$ret = $yac->add('b',123);
////$ret = $yac->get('b');
//var_dump($ret);die;
//$r = new ReflectionClass($yac);
//p($r->getMethods());
//var_dump($yac);die;
//$yac->set('test',12);
//var_dump($yac);
//$ret = $yac->increment('test',1);
//var_dump($ret);
//die;
//
////$html = '<form method="post" action="upload.php" enctype="multipart/form-data">
////<input type="file" name="test" />
////<input type="submit" name="button" value="提交" />
////';
////
////
////
////$html.='</form>';
////
////echo $html;
////die;
////位置、颜色
//
///**
// * RGB转 十六进制
// * @param $rgb RGB颜色的字符串 如：rgb(255,255,255);
// * @return string 十六进制颜色值 如：#FFFFFF
// */
//function RGBToHex($rgb){
//    $regexp = "/^rgb\(([0-9]{0,3})\,\s*([0-9]{0,3})\,\s*([0-9]{0,3})\)/";
//    $re = preg_match($regexp, $rgb, $match);
//    $re = array_shift($match);
//    $hexColor = "#";
//    $hex = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
//    for ($i = 0; $i < 3; $i++) {
//        $r = null;
//        $c = $match[$i];
//        $hexAr = array();
//        while ($c > 16) {
//            $r = $c % 16;
//            $c = ($c / 16) >> 0;
//            array_push($hexAr, $hex[$r]);
//        }
//        array_push($hexAr, $hex[$c]);
//        $ret = array_reverse($hexAr);
//        $item = implode('', $ret);
//        $item = str_pad($item, 2, '0', STR_PAD_LEFT);
//        $hexColor .= $item;
//    }
//    return $hexColor;
//}
//
//function computeColor($i, $imagex, $imagey)
//{
//    $rTotal = 0;
//    $gTotal = 0;
//    $bTotal = 0;
//    $total = 0;
//    for ($x=0;$x<$imagex;$x++) {
//        for ($y=0;$y<$imagey;$y++) {
//            $rgb = imagecolorat($i,$x,$y);
//            $r=($rgb >>16) & 0xFF;
//            $g=($rgb >> 8)& 0xFF;
//            $b=$rgb & 0xFF;
//            $rTotal += $r;
//            $gTotal += $g;
//            $bTotal += $b;
//            $total++;
//        }
//    }
//    $rAverage = round($rTotal/$total);
//    $gAverage = round($gTotal/$total);
//    $bAverage = round($bTotal/$total);
//    return [$rAverage, $gAverage, $bAverage];
//}
//
//
//$path =  __DIR__.'/images/photo.jpg';
//$i=imagecreatefromjpeg($path);//测试图片，自己定义一个，注意路径
//for ($x=0;$x<imagesx($i);$x++) {
//    for ($y=0;$y<imagesy($i);$y++) {
//        $rgb = imagecolorat($i,$x,$y);
//        $r=($rgb >>16) & 0xFF;
//        $g=($rgb >> 8)& 0xFF;
//        $b=$rgb & 0xFF;
//        $rTotal += $r;
//        $gTotal += $g;
//        $bTotal += $b;
//        $total++;
//    }
//}
//$rAverage = round($rTotal/$total);
//$gAverage = round($gTotal/$total);
//$bAverage = round($bTotal/$total);
//
//$im = imagecreatetruecolor(100, 100);
//$bg = imagecolorallocatealpha($im , 0 , 0 , 0 , 127);//拾取一个完全透明的颜色
//imagefill($im , 0 , 0 , $bg);//填充
//$textColor = RGBToHex($rAverage, $gAverage, $bAverage);
//
//$textcolor = imagecolorallocate($im, $rAverage, $gAverage, $bAverage);
//
//$color = computeColor($i, 20,20);
////$textcolor = imagecolorallocate($im, $color[0], $color[1], $color[2]);
//
//
//imagestring($im, 5, 20, 20, 'maoyan', $textcolor);
//imagestring($im, 3, 20, 40, '(c) 2007-9', $textcolor);
//
//
//
//$destImage = imagecreatefromjpeg(__DIR__.'/images/photo.jpg');
//$destX = imagesx($destImage) - imagesx($im);
//$destY = imagesy($destImage) - imagesy($im);
////var_dump(imagesx($im2));die;
//imagecopyresampled($destImage, $im, imagesx($destImage) / 2, imagesy($destImage) / 2, 0, 0, imagesx($im), imagesy($im), imagesx($im), imagesy($im));
//
//header('Content-Type: image/jpeg');
//
//
//imagejpeg($destImage, null, 100);
//
//
//
//
//
//
//
//
//
//die;
//
//function add_wm($nmw_water, $src_file, $output_file, $x, $y) {
//    if(file_exists($output_file))
//        return;
//    $w1 = MagickGetImageWidth($nmw_water);
//    $h1 = MagickGetImageHeight($nmw_water);
//    $nmw =NewMagickWand();
//    MagickReadImage($nmw, $src_file);
//    // 默认的加水印位置调整
//    $lt_w = 50;
//    $lt_h = 50;
//    if($x == 0){
//        $w = MagickGetImageWidth($nmw);
//        $h = MagickGetImageHeight($nmw);
//        $x = $w;
//        $y = $h;
//    }else{
//        // 根据具体情况调整
//        $lt_w = 30;
//        $lt_h = 40;
//    }
//    MagickCompositeImage($nmw, $nmw_water, MW_OverCompositeOp, $x - $w1 - $lt_w, $y - $h1 - $lt_h);
//    MagickWriteImage($nmw, $output_file);
//    DestroyMagickWand($nmw);
//}
//// 还是groovy的eachFileRecurse好用啊
//function add_wm_recurse($nmw_water, $to_dir, $output_dir, $arr) {
//    $dp = dir($to_dir);
//    while($file=$dp->read()){
//        if($file != '.' && $file != '..'){
//            if(is_dir($to_dir . '/' . $file)){
//                mkdir($output_dir . '/' . $file);
//                add_wm_recurse($nmw_water, $to_dir . '/' . $file, $output_dir . '/' . $file, $arr);
//            }else{
//                if(!array_key_exists($to_dir . '/' . $file, $arr)){
//                    continue;
//                }
//                $sub_arr = $arr[$to_dir . '/' . $file];
//                if($sub_arr){
//                    $x = intval($sub_arr[0]);
//                    $y = intval($sub_arr[1]);
//                    add_wm($nmw_water, $to_dir . '/' . $file, $output_dir . '/' . $file, $x, $y);
//                }
//            }
//        }
//    }
//    $dp->close();
//}
//$to_dir = './resized';
//$output_dir = './output';
//// 这个是我用java的ImageIO遍历图片像素获取的符合裤子颜色的区域的坐标array(posX, posY)
//$arr = array(
//    array(50, 50)
//);
//$water = './water.png';
//$nmw_water =NewMagickWand();
//MagickReadImage($nmw_water, $water);
//add_wm_recurse($nmw_water, $to_dir, $output_dir, $arr);
//DestroyMagickWand($nmw_water);

/**
 * Created by PhpStorm.
 * User: huangxiaoyan
 * Date: 2018/4/20
 * Time: 下午6:09
 */
//include 'TestServiceImpImp.php';
//use Thrift\Transport\TBufferedTransport;
//use Thrift\Transport\TPhpStream;
//use \Thrift\Protocol\TBinaryProtocol;

//$testService = new TestServiceImp();
//$processor = new  TestServiceProcessor($testService);
//$transport = new \Thrift\Transport\TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
//$protocol = new  \Thrift\Protocol\TBinaryProtocol($transport, true, true);
//
//$transport->open();
//$processor->process($protocol, $protocol);
//$transport->close();
