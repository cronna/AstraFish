<?php

use app\entity\Refunds;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\repository\BooksRepository;
use app\repository\StaffRepository;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/**
 * @var $refunds
 */

$this->title = 'Возвраты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refunds-index">

    
<h1><?= Html::encode($this->title) ?></h1>


<table class='table'>

    <tbody>

    <tr>

        <td>ID</td>

        <td>Дата</td>

        <td>Товар</td>

        <td>Сотрудник</td>

        <td>Состояние</td>

        <td> </td>

    </tr>

    <?php foreach($refunds as $refund): ?>
        <tr>
            <td><?= $refund->id ?></td>
            <td><?= $refund->date ?></td>
            <td><?= BooksRepository::getBookById($refund->book_id)->title ?></td>
            <td><?= StaffRepository::getStaffById($refund->staff_id)->fio ?></td>
            <td><?= $refund->condition_id ?></td>
            <td>
                <a href="view?id=<?= $refund->id ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA9UlEQVR4nO2UPQ4BURSFv0I0hkItsRTDdixAiN5Yhh0IVkBlA7qpGBagUJKXnEhw3/OmmSh8yW3euefe9w9/fp02MAQ2wBG4KY4aGyqnNDVgDFyB+5e4Ktd5ougA+4jC97fYyxukC+SGeQn0gIYiBVZGXq4aJglwMEyjwIQmRv5BtT5YeGbuqANz4AwUQKYxx9rwuVovpJ597UnPDM2NOfoer6v5ZOdJSqSfDe0irenxbss0KAztJK0V0yD9sszM0GbSBjFb5DvklbS6mhTGIW9iDjl0TSf4mZa5pqGHttZtSRQDz8yDD62Sr6KSz66S7/pPdTwA4jXIWC41knQAAAAASUVORK5CYII="></a>
                <a href="update?id=<?= $refund->id ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAcUlEQVR4nO2SOwqAMBAFx89t9DiCxzGlB7HxjBZr4QpBtHJftwNLCIEZWALJRQFWhHLzCY+MwFEFzIMhNH7OikgBdqD3+/SILH/l5vMWCZObzwZ0/j5Ey62KtCq5KdZiKS+5li9kv+VGKkctRy1PeOMEwHpzkejzGi8AAAAASUVORK5CYII="></a>
                <a href="delete?id=<?= $refund->id ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAnElEQVR4nOXQMQ4BURSF4T+htYRZBCV7EOWUojYltRIle2AjLISWnoRkNCrVPedKBH9yy3e+5MG/NAPql5s7Q/Wb7nPAb7ROfM0qAkwTwCQClAmgjAC9BNCNAEUCKCJAA7gZ43egSbCjARwQ2hvATgG2BrBRgKUBLBSgMoCxAgwMoK8AHQNoK0ALuArjl+cbqRFwDoyfgKE6/j09AJFI8b7yqJNqAAAAAElFTkSuQmCC"></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>


</div>
