<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\entity\Distributions $model */
/** @var yii\widgets\ActiveForm $form */
/**
 * @var $boo;
 * @var $st;
 * @var $cl;
 */
?>

<div class="distributions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->input('date', ['value' => date('d.m.Y')]) ?>

    <?= $form->field($model, 'book_id')->dropDownList($boo) ?>

    <?= $form->field($model, 'staff_id')->dropDownList($st) ?>

    <?= $form->field($model, 'client_id')->dropDownList($cl) ?>

    <?= $form->field($model, 'term')->input('number') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
