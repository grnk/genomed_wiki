<?php


namespace common\models\components;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadFile extends Model
{
    public function rules()
    {
        return [
            [
                ['uploadedFile'], 'file', 'skipOnEmpty' => false,
            ],
        ];
    }

    /**
     * @var UploadedFile
     */
    public $uploadedFile;

    /** @var string Папка для сохранения */
    public $folderSave;

    /**
     * Наименование файла
     * @var string
     */
    public $nameFile;

    public function upload()
    {
        if ($this->validate()) {
            $this->uploadedFile->saveAs($this->getFullPath(), false);
            return true;
        } else {
            return false;
        }
    }

    public function getFullPath($fileName = null){
        return $this->getPathSave() . DIRECTORY_SEPARATOR . (is_null($fileName) ? $this->nameFile : $fileName);
    }

    public function getPathSave(){
        $path = Yii::getAlias('@files/upload') . DIRECTORY_SEPARATOR . $this->folderSave;
        /** Проверка существования папки */
        if(!is_dir($path)){
            mkdir($path, 0777, true);
        }

        return $path;
    }

    /**
     * @param string $fileName
     * @return bool
     */
    public function issetFile($fileName)
    {
        return is_file($this->getFullPath($fileName));
    }

    public function getErrorUpload(){
        return $this->getFirstError('uploadedFile');
    }
}