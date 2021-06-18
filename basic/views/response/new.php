<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Response */

$this->title = 'Отклик на запрос';

$this->params['breadcrumbs'][] = $this->title;
?>

<?php foreach ($requests as $request) {
?>
<div class="row block_request_single">

<div class="row">
<div class="col-sm-6 title_request_single"><span> <?php echo $request->title; ?></span> </div>
<div class="col-sm-6 price_request_single"><span> <?php echo $request->price; ?> рублей</span> </div>
</div>



<div class="row desc_request_single"><span> <?php echo $request->description; ?></span> </div>


<div class="row user_request_single"><span> <?php // echo $request->user; ?></span> </div>

</div>



<?php
} ?>

<div class="response-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_new', [
        'model' => $model,
    ]) ?>

</div>
