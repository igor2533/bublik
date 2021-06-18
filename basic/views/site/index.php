<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = 'Test DB';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Top Freelance</h1>
    </div>

    <div class="container requests">

    <?php 
    
    foreach ($requests as $request) {?>
   
   <div class="col-sm-4">
   <div class="row request_cart">
   <div class="row title_cart_request"><span><?php  echo $request->title; ?></span></div>
   <div class="row price_cart_request"><span><?php  echo $request->price; ?> рублей</span></div>
   <div class="row date_cart_request"><span>Дата: <?php  echo $request->date; ?></span></div>
   <div class="row button_cart_request"><button onclick="window.location.href='/response/new?id=<?php  echo $request->id; ?>'" class="btn btn-success">Откликнуться</button></div>
   </div>
    </div>
    <?php   }   ?>

    </div>

    <?= LinkPager::widget(['pagination' => $pagination]) ?>



</div>

</div>


<div class="container" style="margin-top:50px;">
     <?php 
    
    foreach ($users as $user) {?>
   

   <div class="col-sm-4 kartochka">
       <div>
   <div class="row"><a href="/users/profile?id=<?php echo $user->id;  ?>"><img style="width:130px;" src="<?php  echo $user->logo; ?>"></a></div>
   <div class="row username_kartocha"><span><?php  echo $user->username; ?></span></div>
   <div class="row user_rating"><span>Рейтинг: 4 из 5</span></div>
    </div>
   </div>
    <?php   }   ?>

    </div>

    <?= LinkPager::widget(['pagination' => $pagination]) ?>

     </div>

     </div>



