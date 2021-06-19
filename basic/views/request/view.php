<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = $model->title;

$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         
            'title:ntext',
            'price:ntext',
            'description:ntext',
            'date:ntext',
        ],
    ]) ?>

</div>

<div class="row blocks_response"> 
 


    
<?php foreach ($responses as $response) {?>
<div class="row block_response">
    <form action="/orders/create" methor="post">
<div class="row">
<div class="col-sm-6">
 <div class="row response_title"><span><?php echo $response->title; ?></span> </div>   
 <div class="row response_desc"><span><?php echo $response->description; ?></span> </div>  
</div> 
<div class="col-sm-6">
 <div class="row response_date"><span><?php echo $response->date; ?></span> </div> 
 <div class="row response_price"><span><?php echo $response->price; ?> рублей</span> </div> 
 <div class="row response_author"><a href="/users/profile?id=<?php echo $response->freelancer_id ?>"><span>Автор: <?php echo $response->author->username; ?> </span></a> </div>
</div>
</div>
<div class="row">
 <div class="row response_timing"><span>Сроки: <?php echo $response->timing; ?> дня(дней)</span> </div>
 <div class="row response_submit"><input type="submit" value="Выбрать и создать заказ"/> </div>
 <input type="text" name="freelancer_id" value="<?php echo $response->freelancer_id ;?>" />
 <div class="row response_author"><a href="/orders/create"><span>Выбрать этого исполнителя</span></a> </div>
 
</div>
</form>

</div>
<?php }  ?>

</div>





