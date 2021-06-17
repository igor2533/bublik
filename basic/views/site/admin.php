<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Страница Админка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      "Это страница админки"
    </p>

    <div class="row">
   <ul>
<li><a href="/users/">Пользователи</a></li>
<li><a href="/request/">Запросы</a></li>
<li><a href="/response/">Отклики</a></li>
   </ul>

    </div>

    <code><?= __FILE__ ?></code>
</div>
