<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\Distributions $model */
/**
 * @var $books;
 * @var $staff;
 * @var $clients;
 */

 $boo = [];
 $st = [];
 $cl = [];

$this->title = 'Выдача';
$this->params['breadcrumbs'][] = ['label' => 'Distributions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

foreach($books as $book){
    $boo[$book->id] = $book->title;
}

foreach($staff as $staf){
    $st[$staf->id] = $staf->fio;
}

foreach($clients as $client){
    $cl[$client->id] = $client->fio;
}
?>
<div class="distributions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'boo' => $boo,
        'st' => $st,
        'cl' => $cl
    ]) ?>

</div>
