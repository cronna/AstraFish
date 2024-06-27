<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\Staff $model */

$this->title = 'Добавление сотрпудника';
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
