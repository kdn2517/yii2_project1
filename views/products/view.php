<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrap">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Set Image', ['set-image', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('CRUD', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'description:ntext',
            'number',
            'price',
            [
                'format' => 'html',
                'label' => 'category',
                'value' => function($data)
                  {
                     $subCat = app\models\SubCategory::findOne($data->category);
                     $cat = app\models\Category::findOne($subCat->category);
                     return $cat->name . "<br>" . $subCat->name;
                  }
            ],
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function($data)
                      {
                          return Html::img($data->getImage(), ['width' => 100]);
                      }
            ],
        ],
    ]) ?>

</div>
