<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Books $model */

$this->title = 'Изменение книги: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

$cat = [];
$auth = [];

foreach($categories as $category){
    $cat[$category->id] = $category->title;
}

foreach($authors as $author){
    $auth[$author->id] = $author->fio;
}

?>
<div class="books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cat' => $cat,
        'auth' => $auth
    ]) ?>

</div>  