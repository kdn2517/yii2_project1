<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrap">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('CRUD sub-category', ['sub-category/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('CRUD category', ['category/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
