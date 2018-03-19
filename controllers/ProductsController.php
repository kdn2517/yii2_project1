<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\ImageUpload;
use app\models\Image;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'denyCallback' => function($rule, $action)
                                  {
                                     throw new \yii\web\NotFoundHttpException();
                                  },
                'rules' => [
                    ['allow' => true,
                     'matchCallback' => function($rule, $action)
                                      {
                                         return Yii::$app->user->identity->role;
                                      }
                    ]
                ]
            ]    
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
        ]);
        $this->view->params['pageTitle'] = 'CRUD';
        $this->layout = 'alter';
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->view->params['pageTitle'] = 'View';
        $this->layout = 'alter';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->view->params['pageTitle'] = 'Create';
        $this->layout = 'alter';
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->view->params['pageTitle'] = 'Update';
        $this->layout = 'alter';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->view->params['pageTitle'] = 'Delete';
        $this->layout = 'alter';
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->view->params['pageTitle'] = 'CRUD';
        $this->layout = 'alter';
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /**
     * 
     * @param type $id
     * @return type
     * Установить картинку
     */
    public function actionSetImage($id)
    {
        $this->view->params['pageTitle'] = 'set image';
        $this->layout = 'alter';
        $model = new ImageUpload();
        if(Yii::$app->request->isPost){
            $products = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            
            if($products->saveImage($model->uploadImage($file, $products->image))) {
                return $this->redirect(['index']);
            }
        }
        
        return $this->render('image', [
            'model' => $model,
        ]);
    }
    /**
     * 
     * @param type $id
     * @return type
     * Установить картинку в галерую
     */
    public function actionUpdateGallery($id)
    {
        $this->view->params['pageTitle'] = 'set image';
        $this->layout = 'alter';
        $model = new Image();
        $images = Image::find()->where(['id_products' => $id])->all();
        if(Yii::$app->request->isPost){
            $file = UploadedFile::getInstance($model, 'image');
            if($model->uploadImageGallery($file, $id)) {
                return $this->redirect(['index']);
            }
        }
        
        return $this->render('gallery', [
            'model' => $model,
            'images' => $images,
        ]);
    }
    /**
     * Удалить картинку из галереи
     */
    public function actionDeleteImage()
    {
        $imageId = Yii::$app->request->get('imageId');
        $image = Image::findOne(['id' => $imageId]);
        unlink(Image::getFolder() . $image->image);
        $image->delete();
    }
}
