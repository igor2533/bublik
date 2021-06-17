<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Страница пользователя: '.$model->username;
$this->params['breadcrumbs'][] = ['label' => 'Фрилансер'];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>
      
      <div class="row" style="text-align: center;
    padding: 20px;"><img style="width: 260px;
    border: solid 1px #f9f9f9;
    border-radius: 100px;" src="../<?php echo  $model->logo ?>"> </div>
    <div class="row username_profile">
    <span>Имя:</span> <span><?php echo $model->username; ?> </span>
    </div>




</div>
