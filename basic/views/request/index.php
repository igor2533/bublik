<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php //echo GridView::widget([
        //'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
       // 'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],

          //  'id',
           // 'user',
           // 'title:ntext',
           // 'status:ntext',
          //  'price:ntext',
           // 'description:ntext',
            //'date:ntext',

          //  ['class' => 'yii\grid\ActionColumn'],
    //    ],
   // ]);
    
    
    
    
    ?>
                     
                           




                             <div class="category-index">


<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<table class="table">
  
                <tbody>
                    <?php foreach ($requests as $request):?>
                    <tr>
                        <td><?php echo $request->id; ?></td>
                         <td><?php echo $request->title; ?></td>
                         <td><?php // echo $request->getUser($id); 
                   
                         echo $request->author->username ;
                         
                         ?></td>
                         <td><?php echo $request->date; ?></td>
                      <?php if($request->isAllowed()):?>
                          <td><a class="btn btn-warning" href="<?= Url::toRoute(['request/disallow','id'=>$request->id]);?>">Отклонить</a></td>
                        
                        <?php else:?>
                         <td><a class="btn btn-success" href="<?= Url::toRoute(['request/allow','id'=>$request->id]);?>">Одобрить</a></td>
                        <?php endif;?>
                         <td><a class="btn btn-danger" href="<?= Url::toRoute(['request/delete','id'=>$request->id]);?>">Удалить</a></td>
                    </tr>
                    <?php endforeach;?>
                    
                    
                </tbody>
    
</table> 

</div>













</div>
