<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\Users $model */

$this->title = 'Добавление пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
