<?php















function p($array)
{
    echo '<pre>'.print_r($array, true).'</pre>';
}
function dd($array)
{
    echo '<pre>'.print_r($array, true).'</pre>';
    die;
}
p($_FILES);
dd($_POST);


class ImageUpload
{
    const UPLOAD_TYPE_MUTI = 1; //多图上传
    const UPLOAD_TYPE_SINGLE = 2; // 单图上传

    public $uploadType;

    const UPLOAD_DATA_WAY_FILE = 1;  //$_FILE
    const UPLOAD_DATA_WAY_BASE64 = 2; // base64
    const UPLOAD_DATA_WAY_BINARY = 3;  // 二进制
    public $uploadDataWay;

    public $savePath;

    public function __construct()
    {
        $this->savePath = config('upload_path');
    }

    public function upload($uploadData, $uploadType = self::UPLOAD_TYPE_MUTI, $uploadDataWay = self::UPLOAD_DATA_WAY_FILE)
    {
        $this->checkUploadType($uploadType);
        $this->checkUploadWay($uploadDataWay);
        $this->getUploadData($uploadData);

    }

    public function checkUploadType($uploadType)
    {
        if(!in_array($uploadType, array(self::UPLOAD_TYPE_MUTI, self::UPLOAD_TYPE_SINGLE))) {
            throw new Exception('错误的上传方式');
        }
        $this->uploadType = $uploadType;
    }

    public function checkUploadWay($uploadWay)
    {
        if(!in_array($uploadWay, array(self::UPLOAD_DATA_WAY_FILE, self::UPLOAD_DATA_WAY_BASE64, self::UPLOAD_DATA_WAY_BINARY))) {
            throw new Exception('错误的上传类型');
        }
        $this->uploadDataWay = $uploadWay;
    }

    public function getUploadData($uploadData)
    {
        $data = array();
        switch ($this->uploadDataWay) {
            case self::UPLOAD_DATA_WAY_BINARY :
                $data = $this->getUploadDataFromBase64($uploadData);
                break;
            case self::UPLOAD_DATA_WAY_BASE64:
                $data = $this->getUploadDataFromBinary($uploadData);
                break;
            case self::UPLOAD_DATA_WAY_FILE:
                $data = $this->getUploadDataFromFile($uploadData);
                break;
            default:
                throw new Exception('错误的上传类型');
        }
        return $data;
    }

    public function getUploadDataFromFile($uploadData)
    {

    }

    public function getUploadDataFromBase64($uploadData)
    {

    }
    public function getUploadDataFromBinary($uploadData)
    {

    }

    public function createWaterToImage()
    {

    }

    public function downloadAndZip()
    {

    }


    public function createFileName()
    {

    }

    public function getExtFromUpload()
    {

    }

}