<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'level')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'pass')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <?php if(!empty($model->logo)){
    //echo Html::img($model->logo, $options = ['class' => 'postImg', 'style' => ['width' => '180px']]);
  ?>

<div class="row" style="text-align: center;
    padding: 20px;"><img style="width: 260px;
    border: solid 1px #f9f9f9;
    border-radius: 100px;" src="../<?php echo  $model->logo ?>"> </div>



  <?php


} ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
