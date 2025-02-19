<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BooksSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'category_id')->dropDownList($cat) ?>

    <?= $form->field($model, 'author_id')->dropDownList($auth) ?>

    <?= $form->field($model, 'deliv_date')->input('date', ['value' => date('d.m.Y')])?>


    <?= $form->field($model, 'avail')->checkbox(['checked' => 'checked']) ?>

    <?= $form->field($model, 'art') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
