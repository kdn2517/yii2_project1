<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SubCategory;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wrap">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'number')->textInput() ?>
    
    <?= $form->field($model, 'price')->textInput() ?>
    
    <?= $form->field($model, 'category')->dropDownList(SubCategory::find()->select(['name'])->indexBy('id')->column()); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
