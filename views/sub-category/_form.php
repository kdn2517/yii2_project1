<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category

/* @var $this yii\web\View */
/* @var $model app\models\SubCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wrap">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'category')->dropDownList(Category::find()->select(['name'])->indexBy('id')->column()); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
