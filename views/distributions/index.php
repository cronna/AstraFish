<?php

use app\entity\Distributions;
use yii\helpers\Html;

use app\repository\BooksRepository;
use app\repository\StaffRepository;
use app\repository\ClientsRepository;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/**
 * @var $distributions
 */

$this->title = 'Продажи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать продажу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class='table'>

        <tbody>

        <tr>

            <td>ID</td>

            <td>Дата</td>

            <td>Товар</td>

            <td>Сотрудник</td>

            <td>Клиент</td>

            <td>Сумма</td>

            <td> </td>

        </tr>

        <?php foreach($distributions as $dist): ?>
            <tr>
                <td><?= $dist->id ?></td>
                <td><?= $dist->date ?></td>
                <td><?= BooksRepository::getBookById($dist->book_id)->title ?></td>
                <td><?= StaffRepository::getStaffById($dist->staff_id)->fio ?></td>
                <td><?= CLientsRepository::getClientById($dist->client_id)->fio ?></td>
                <td><?= Html::a('Оформить возврат', ['/refunds/create?dist_id=' . $dist->id], ['class' => 'btn btn-success']);?></td>
                <td><?= BooksRepository::getBookById($dist->book_id)->price ?></td>
                <td>
                    <a href="delete?id=<?= $dist->id ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAnElEQVR4nOXQMQ4BURSF4T+htYRZBCV7EOWUojYltRIle2AjLISWnoRkNCrVPedKBH9yy3e+5MG/NAPql5s7Q/Wb7nPAb7ROfM0qAkwTwCQClAmgjAC9BNCNAEUCKCJAA7gZ43egSbCjARwQ2hvATgG2BrBRgKUBLBSgMoCxAgwMoK8AHQNoK0ALuArjl+cbqRFwDoyfgKE6/j09AJFI8b7yqJNqAAAAAElFTkSuQmCC"></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>
    


</div>
