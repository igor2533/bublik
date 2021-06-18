<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Response */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="response-form">

    <?php

    
  
    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->input(['maxlength' => true, 'value' => $request->user])->label(false) ?>

    <?= $form->field($model, 'id_request')->hiddenInput(['value' =>  $get_request])->label(false) ?>

    <?= $form->field($model, 'freelancer_id')->hiddenInput(['value' => $id_active_user ])->label(false) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6])->label('Заголовок') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание')  ?>

    <?= $form->field($model, 'date')->hiddenInput(['value' =>  date("d.m.Y")])->label(false) ?>

    <?= $form->field($model, 'price')->input(['rows' => 6])->label('Цена') ?>

    <?= $form->field($model, 'timing')->dropDownList([
    '1' => '1 день',
    '2' => '2 дня',
    '3'=>'3 дня'
])->label('Сроки') ?>

    <div class="form-group">
        <?= Html::submitButton('Откликнуться', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
