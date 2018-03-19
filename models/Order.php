<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $id_products
 * @property int $amount
 * @property int $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_products', 'amount', 'user'], 'required'],
            [['id_products', 'amount', 'user'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_products' => 'Id Products',
            'amount' => 'Amount',
            'user' => 'User',
        ];
    }
 /**
  * 
  * @param type $order - товар в корзине
  * @param type $session['user'] - id пользователя
  * Оформить заказ
  */   
    public function saveOrder($order, $session)
    {
        $this->id_products = $order['id'];
        $this->user = $session['user'];
        $this->amount = $order['number'];
        $this->save();
    }
}
