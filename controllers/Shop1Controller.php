<?php
namespace app\controllers;
 
use yii\web\Controller;
use app\models\LoginForm;
use app\models\Products;
use app\models\Category;
use app\models\SubCategory;
use Yii;

class Shop1Controller extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
       $products = Products::find()->limit(9)->all();
       $this->view->params['pageTitle'] = 'Главная страница';
       $this->layout = 'alter';
       return $this->render('index', [
           'products' => $products,
       ]);
    } 
   
    public function actionContact()
    {
       $this->view->params['pageTitle'] = 'Главная страница';
       $this->layout = 'alter';
       return $this->render('contact');
    } 
   
    public function actionDetails() 
    {
        $product = \app\models\Products::findOne(['id' =>Yii::$app->request->get('id')]);
        $this->view->params['pageTitle'] = 'Главная страница';
        $this->layout = 'alter';
        return $this->render('details',[
            'product' => $product,
        ]);
    }

    public function actionProducts() 
    {
        $products = Products::findAll(['category' =>Yii::$app->request->get('id')]);
        $category = SubCategory::findOne(['id' =>Yii::$app->request->get('id')])->name;
        $this->view->params['pageTitle'] = 'Главная страница';
        $this->layout = 'alter';
        return $this->render('products',[
            'products' => $products,
            'category' => $category,
        ]);
    }

    public function actionRegister() 
    {
        $this->view->params['pageTitle'] = 'Главная страница';
        $this->layout = 'alter';
        return $this->render('register');
    }
   
    public function actionTest() 
    {
        $this->view->params['pageTitle'] = 'Главная страница';
        $this->layout = 'test';
        return $this->render('test');
    }
    
    public function actionLogin()
    {        
            $this->view->params['pageTitle'] = 'Главная страница';
            $this->layout = 'alter';
        if (!Yii::$app->user->isGuest) {
            return $this->render['index'];
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index');
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        $this->view->params['pageTitle'] = 'Главная страница';
        $this->layout = 'alter';
        return $this->render('index');
    }

}