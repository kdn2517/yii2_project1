<?php

namespace app\controllers;

use app\models\Products;
use app\models\Cart;
use app\models\Order;
use yii\web\Controller;
use Yii;
/**
 * Контроллер корзины
 */
class CartController extends Controller
{
    /**
     * 
     * @return type
     * Просмотр корзины без шапки сайта
     */
    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
    /**
     * 
     * @return type
     * Просмотр корзины 
     */
    public function actionCart()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->view->params['pageTitle'] = 'Корзина';
        $this->layout = 'alter';
        return $this->render('cart-modal', compact('session'));
    }
    /**
     * 
     * @return boolean
     * Добавить товар в корзину
     */
    public function actionAdd()
    {
        $productId = Yii::$app->request->get('productId');
        if(!empty(Yii::$app->request->get('number'))) {
            $number = Yii::$app->request->get('number');
        } else {
            $number = 1;
        }
        $product = Products::findOne($productId);
        if(empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $number);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
    /**
     * 
     * @return boolean
     * Убрать одину штуку товара из корзины
     */
    public function actionMinus() 
    {
        $productId = Yii::$app->request->get('productId');
        $product = Products::findOne($productId);
        if (empty($product))
            return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->minusFromCart($product);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
    /**
     * 
     * @return boolean
     * Убрать товар из корзины
     */
    public function actionClean()
    {
        $productId = Yii::$app->request->get('productId');
        $product = Products::findOne($productId);
        if (empty($product))
            return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->removeProductFromCart($product);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
    /**
     * 
     * @return typeо
     * Оформить заказ
     */
    public function actionBuy()
    {
        $session = Yii::$app->session;
        $session->open();
        foreach($session['cart'] as $orderSession) {
            $order = new Order;
            $order->saveOrder($orderSession, $session);
        }
        $products = Products::find()->orderBy('id DESC')->limit(9)->all();
        $this->view->params['pageTitle'] = 'Главная страница';
        $this->layout = 'alter';
        return $this->render('index', [
                    'products' => $products,
        ]);
    }
}

