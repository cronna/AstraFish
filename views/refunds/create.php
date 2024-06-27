<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\Refunds $model */
/**
 * @var $staff;
 * @var $conditions;
 * @var $book
 */

$this->title = 'Возврат книги';
$this->params['breadcrumbs'][] = ['label' => 'Refunds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

foreach($staff as $staf){
    $st[$staf->id] = $staf->fio;
}

foreach($conditions as $condition){
    $con[$condition->id] = $condition->condition;
}
?>
<div class="refunds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'st' => $st,
        'con' => $con,
        'book' => $book
    ]) ?>

</div>
