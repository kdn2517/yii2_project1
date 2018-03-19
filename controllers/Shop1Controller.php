<?php
namespace app\controllers;
 
use yii\web\Controller;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\Products;
use app\models\Category;
use app\models\SubCategory;
use app\models\User;
use app\models\Image;
use Yii;

class Shop1Controller extends Controller
{
    public $enableCsrfValidation = false;
/**
 * 
 * @return type
 * Главная страница
 */
    public function actionIndex()
    {
       $products = Products::find()->orderBy('id DESC')->limit(9)->all();
       $this->view->params['pageTitle'] = 'Главная страница';
       $this->layout = 'alter';
       return $this->render('index', [
           'products' => $products,
       ]);
    } 
 /**
  * 
  * @return type
  * Просмотр товара
  */ 
    public function actionDetails() 
    {   
        $product = Products::findOne(['id' => Yii::$app->request->get('id')]);
        $this->view->params['pageTitle'] = $product->name;
        $images = Image::findAll(['id_products' => $product->id]);
        $this->layout = 'alter';
        return $this->render('details',[
            'product' => $product,
            'images' => $images,
        ]);
    }
/**
 * 
 * @return type
 * Просмотр подкатегории
 */
    public function actionProducts() 
    {
        $products = Products::findAll(['category' => Yii::$app->request->get('id')]);
        $category = SubCategory::findOne(['id' => Yii::$app->request->get('id')])->name;
        $this->view->params['pageTitle'] = $category;
        $this->layout = 'alter';
        return $this->render('products',[
            'products' => $products,
            'category' => $category,
        ]);
    }
/**
 * 
 * @return type
 * Регистрация
 */
    public function actionSignup() 
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new SignupForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = new User();
            $user->username = $model->username;
            $user->password = \Yii::$app->security->
                                         generatePasswordHash($model->password);
            $user->email = $model->email;
            if($user->save()){
                $products = Products::find()->orderBy('id DESC')->limit(9)->all();
                $this->view->params['pageTitle'] = 'Главная страница';
                $this->layout = 'alter';
                return $this->render('index', [
                    'products' => $products,
                ]);
            }
        }
        $this->view->params['pageTitle'] = 'Регистрация';
        $this->layout = 'alter';
        return $this->render('register', compact('model'));
    }
   
    public function action() 
    {   
        
    }   
/**
 * 
 * @return type
 * Вход
 */   
    public function actionLogin()
    {       
            $products = Products::find()->limit(9)->all(); 
            $this->layout = 'alter';
        if (!Yii::$app->user->isGuest) {
            $this->view->params['pageTitle'] = 'Главная страница';
            return $this->render('index', [
                    'products' => $products,
        ]);
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->view->params['pageTitle'] = 'Главная страница';
            return $this->render('index', [
                    'products' => $products,
        ]);
        }
        $model->password = '';
        $this->view->params['pageTitle'] = 'Вход';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
/**
 * 
 * @return type
 * Выход
 */
    public function actionLogout()
    {   
        $products = Products::find()->limit(9)->all();
        Yii::$app->user->logout();
        $this->view->params['pageTitle'] = 'Главная страница';
        $this->layout = 'alter';
        return $this->render('/shop1/index', [
                    'products' => $products,
        ]);
    }

}