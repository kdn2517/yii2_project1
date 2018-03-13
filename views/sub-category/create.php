<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SubCategory */

$this->title = 'Create Sub Category';
$this->params['breadcrumbs'][] = ['label' => 'Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrap">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
