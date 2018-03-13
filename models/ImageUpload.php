<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ImageUpload extends Model
{
    public $image;
    
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png,jpeg']
        ];
    }
    
    public function uploadImage($file, $currentImage)
    {
        $this->image = $file;
        if($this->validate()) {
            $this->deleteCurrentImage($currentImage);
            $name = uniqid() . "." . $file->extension;
            $file->saveAs($this->getFolder() . $name);
            return ($name);
        }
    }
    
    public function getFolder(){
        return Yii::getAlias('@webroot') . '/uploads/';
    }
    
    public function deleteCurrentImage($file)
    {
        if(is_file($this->getFolder() . $file)) {
            unlink($this->getFolder() . $file);
        }
    }

}
