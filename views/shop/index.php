<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Button;

foreach ($products as $product){ ?>
    <div class="products">
    
        <h3><?=$product['name']?></h3>
    
        <p><?=substr($product['description'], 0, 220)?></p>
            
        <p><?=$product['price']?></p>
    
    </div>

<?php } ?>

<div id="cart">
    <?=$cartStatus?>
</div>

    
<?php
$form = ActiveForm::begin([
   // идентификатор формы
   'id' => '',
    'options' => [
	// класс формы
        'class' => 'form-horizontal',
        // возможность загрузки файлов
        'enctype' => 'multipart/form-data'
     ],
]);
echo $form->field($model, 'product_id')->hiddenInput(['value' => "2"])->label(false); 
echo $form->field($model, 'count')->dropDownList(['1' => '1', '2' => '2', '3' => '3'])->label('Количество');
echo Html::submitButton('button1', ['class' => 'btn btn-primary']);
ActiveForm::end();
