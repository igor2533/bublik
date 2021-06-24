<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

 
<div class="row orders_block"> 


<?php foreach ($orders as $order) {  ?>
<div class="row order_block">  
<div class="title_order"> <span> <?php echo $order->title;  ?></span></div>
<div class="freelancer_order">  <span><?php echo $order->author->username;  ?> </span></div>
<div class="date_order"> <span><?php echo $order->date;  ?>  </span></div>
<div class="desc_order"> <span><?php echo $order->description;  ?> </span> </div>
<div class="cost_order"> <span>  <?php echo $order->price;  ?></span></div>
<div class="timing_order"> <span>Сроки: <?php echo $order->timing;  ?></span> </div>






 </div>
<?php } ?>
</div>

    


</div>
