<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Books $model */

/**
 * @var $categories;
 * @var $authors;
 */
$cat = [];
$auth = [];

$this->title = 'Добавление товара';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

foreach($categories as $category){
    $cat[$category->id] = $category->title;
}

foreach($authors as $author){
    $auth[$author->id] = $author->fio;
}

?>
<div class="books-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cat' => $cat,
        'auth' => $auth
    ]) ?>

</div>