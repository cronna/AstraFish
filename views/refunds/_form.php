<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\entity\Refunds $model */
/** @var yii\widgets\ActiveForm $form */

/**
 * @var $st;
 * @var $con;
 * @var $dist_id
 */
?>

<div class="refunds-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->input('date', ['value' => date('d.m.Y')]) ?>

    <?= $form->field($model, 'book_id')->textInput(['value' => $book->id, 'style' => 'display: none;']), '<span style="margin-bottom: 10px; display: block;">' . $book->title . '</span>' ?>

    <?= $form->field($model, 'staff_id')->dropDownList($st) ?>

    <?= $form->field($model, 'condition_id')->dropDownList($con) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
