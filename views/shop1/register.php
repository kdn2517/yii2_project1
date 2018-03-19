<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="wrap">
            <div class="register-grids">
                <?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<div class="form-group">
 <div>
 <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
 </div>
</div>
<?php ActiveForm::end() ?>
            </div>
</div>
	