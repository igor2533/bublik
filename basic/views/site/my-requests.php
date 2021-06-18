<?php



use yii\helpers\Html;
$this->title = 'Мои запросы';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container requests">

<?php 

foreach ($requests as $request) {?>


<div class="row request_cart">
<div class="row title_cart_request"><span><?php  echo $request->title; ?></span></div>
<div class="row price_cart_request"><span><?php  echo $request->price; ?> рублей</span></div>
<div class="row date_cart_request"><span>Дата: <?php  echo $request->date; ?></span></div>
<div class="row button_cart_request"><button onclick="window.location.href='/request/view?id=<?php  echo $request->id; ?>'" class="btn btn-success">Посмотреть отклики</button></div>

</div>
<?php   }   ?>




</div>