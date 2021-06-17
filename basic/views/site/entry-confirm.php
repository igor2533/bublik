<?php
use yii\helpers\Html;
?>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>title</label>: <?= Html::encode($model->title) ?></li>
    <li><label>price</label>: <?= Html::encode($model->price) ?></li>
</ul>