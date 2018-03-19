<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $number
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'number', 'price'], 'required'],
            [['name', 'description'], 'string'],
            [['number'], 'string', 'max' => 10],
            [['category'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'number' => 'Number',
            'image' => 'image',
            'category' => 'Category',
            'gallery' => 'Gallery'
        ];
    }   
    
    public function saveImage($fileName) 
    {
        $this->image = $fileName;
        return $this->save(false);
    }
    
    public function getImage()
    {
        return($this->image) ? '/web/uploads/' . $this->image : '/web/uploads/no-photo.png';
    }

        
    public function deleteImage() 
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }
}
