<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\Refunds $model */

/**
 * @var $staff;
 * @var $cinditions;
 */


$this->title = 'Изменение возврата: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Refunds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

$st = [];
$con = [];

foreach($staff as $staf){
    $st[$staf->id] = $staf->fio;
}

foreach($conditions as $condition){
    $con[$condition->id] = $condition->condition;
}
?>
<div class="refunds-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'st' => $st,
        'con' => $con
    ]) ?>

</div>
