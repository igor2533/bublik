<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Response */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="response-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_request')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'freelancer_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'timing')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
