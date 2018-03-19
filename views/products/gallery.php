<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cigarette */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wrap">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <?php foreach ($images as $image) { ?>
        <div class="product-my image<?=$image->id?>">
            <div class="myClassInGallery" dataContentId="<?=$image->id?>"><p>-</p></div>        
            <img src="/web/uploads/<?= $image->image ?>" height="150px" width="150px"/>                    
        </div>
    <?php } ?>

</div>

<script>
$(document).ready(function ()
{
    $(".myClassInGallery").on("click", function (e) {
        var imageId = $(this).attr('dataContentId');        
        id = '.image' + imageId;
        $.ajax({
            url: "/products/delete-image",
            type: "GET",
            data: ({imageId: imageId}),
            beforeSend: function ()
            {

            },
            success: function (data)
            {
                $(id).remove();
            },
            error: function funcError()
            {
                alert('Ошибка!');
            }
        });
    });
});
</script>