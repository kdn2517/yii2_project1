<?php
namespace app\controllers;
 
use yii\web\Controller;
use Yii;
use yii\filters\VerbFilter;
use app\models\Products;
use app\models\AddForm;

class ShopController extends Controller
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add-in-cart' => ['post'],
                    'set-count' => ['post'],
                    'delete-from-cart' => ['post'],
                ],
            ],
        ]);
    }
 
    public function actionIndex()
    {
        $model = new AddForm();
        if ($model->load(\Yii::$app->request->post())) {
            $data = (\Yii::$app->request->post());
                    $postData = Yii::$app->request->post();
        return json_encode([
            'success' => Yii::$app->cart->add($data['AddForm']['product_id'], $data['AddForm']['count']),
            'cartStatus' => Yii::$app->cart->status
        ]);
        }
        $products = Products::find()
                ->all();
        $cartStatus = Yii::$app->cart->status;
        return $this->render('index', compact('products', 'cartStatus', 'model'));
    }

    public function actionAddInCart()
    {
        $postData = Yii::$app->request->post();
        return json_encode([
            'success' => Yii::$app->cart->add($data['AddForm']['product_id'], $data['AddForm']['count']),
            'cartStatus' => Yii::$app->cart->status
        ]);
    }
 
    public function actionSetCount()
    {
        $postData = Yii::$app->request->post();
        return json_encode([
            'success' => Yii::$app->cart->setCount($postData['product_id'], $postData['count']),
            'cartStatus' => Yii::$app->cart->status
        ]);
    }
 
    public function actionDeleteFromCart()
    {
        $postData = Yii::$app->request->post();
        return json_encode([
            'success' => Yii::$app->cart->delete($postData['product_id']),
            'cartStatus' => Yii::$app->cart->status
        ]);
    }
}
