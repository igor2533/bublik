<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>
<?php  ?>
    <?= $form->field($model, 'user')->hiddenInput(['hidden' => true ,'maxlength' => true, 'value' => $model->user])->label(false) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6])->label('Заголовок') ?>

    <?= $form->field($model, 'price')->input(['rows' => 6])->label('Цена')  ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание')  ?>


    <?= $form->field($model, 'date')->hiddenInput(['hidden' => true ,'maxlength' => true, 'value' => $model->date])->label(false) ?>



    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
