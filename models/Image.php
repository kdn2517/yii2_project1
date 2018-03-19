<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $image
 * @property int $id_products
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'id_products'], 'required'],
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'id_products' => 'Id Products',
        ];
    }
/**
 * 
 * @param type $file
 * @param type $id
 * Добавить картинку в галерею
 */
    public function uploadImageGallery($file, $id) 
    {
        $this->image = $file;
        $this->id_products = $id;
        if ($this->validate()) {
            $name = "000" . uniqid() . "." . $file->extension;
            $file->saveAs($this->getFolder() . $name);
            $this->image = $name;
            $this->save();
        }
    }

    public function getFolder() {
        return Yii::getAlias('@webroot') . '/uploads/';
    }
}
