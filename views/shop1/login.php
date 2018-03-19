<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="content login-box">
    <div class="login-main">
	<div class="wrap">
            <h1>Войдите или зарегестрируйтесь</h1>
		<div class="login-left">
                    <h3>Добро пожаловать!</h3>
                    <p>Создав учетную запись Вы сможете то-то и то-то.</p>
                    <a class="acount-btn" href="/shop1/signup">Зарегестрироваться</a>
                </div>
		<div class="login-right">
                    <h3>Вход</h3>
                    <p>Если у Вас уже есть аккаунт - можете войти.</p>
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'login-right'],
        ]);
?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'password')->passwordInput() ?>


<div>
    <div>
<?= Html::submitButton('Login', ['name' => 'login-button']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

                </div>
		<div class="clear"> </div>
        </div>
    </div>
</div>