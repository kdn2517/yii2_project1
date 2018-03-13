<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrap">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sub Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            [
            'format' => 'html',
            'label' => 'category',
            'value' => function($data) {
                $cat = app\models\Category::findOne($data->category);
                return $cat->name;
            }
            ],
        ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
