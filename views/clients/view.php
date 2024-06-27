<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\entity\Clients $model */

/**
 * @var $clientBooks;
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clients-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-6"><?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'fio',
                'passport_series',
                'passport_number',
            ],
        ]) ?></div>
        <div class="col-6">
            <h3>Книги</h3>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Название</td>

                        <td>Дата возврата</td>

                    </tr>
                    
                    <?php foreach($clientBooks as $book): ?>
                        <tr>
                            <td><?= $book['title'] ?></td>
                            <td><?= $book['date'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            
        </div>
    </div>
    

    

</div>
