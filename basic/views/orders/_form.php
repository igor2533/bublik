<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->hiddenInput(['maxlength' => true])->label(false) ?>
    <!-- need fix 19.06.2021 year -->
    <?= $form->field($model, 'freelancer_id')->hiddenInput([ ])->label(false) ?>

    <?= $form->field($model, 'title')->hiddenInput(['rows' => 6])->label(false) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label("Описание") ?>

    <?= $form->field($model, 'date')->hiddenInput(['rows' => 6])->label(false) ?>

    <?= $form->field($model, 'price')->input(['rows' => 6])->label('Цена') ?>

    <?= $form->field($model, 'timing')->hiddenInput(['rows' => 6])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
