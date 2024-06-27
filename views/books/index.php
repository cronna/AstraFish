<?php

use app\entity\Books;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use app\repository\CategoryRepository;
use app\repository\AuthorsRepository;


/** @var yii\web\View $this */
/** @var app\models\BooksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

/**
 * @var $categories;
 * @var $authors;
 */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;

$cat = [];
$auth = [];

foreach($categories as $category){
    $cat[$category->id] = $category->title;
}

foreach($authors as $author){
    $auth[$author->id] = $author->fio;
}
?>
<div class="books-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="row">
        <div class="col-2">
            <?= $this->render('_search', [
                'model' => $searchModel,
                'cat' => $cat,
                'auth' => $auth
            ]); ?>
        </div>
        <div class="col-10">
        <table class='table'>

            <tbody>

                <tr>

                    <td>ID;</td>

                    <td>Картинка</td>

                    <td>Название</td>

                    <td>Описание</td>

                    <td>Категория</td>

                    <td>Автор</td>

                    <td>Дата</td>

                    <td> </td>

                </tr>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => function ($model, $key, $index, $widget) { ?>
                    <tr>
                        <td><?= $model->id ?></td>
                        <td class='img-td'><div class="books-img"><img src="/books_img/<?= $model->img ?>" alt=""></div></td>
                        <td><?= $model->title ?></td>
                        <td><?= $model->description ?></td>
                        <td><?= CategoryRepository::getCategoryById($model->category_id)->title ?></td>
                        <td><?= AuthorsRepository::getAuthorById($model->author_id)->fio ?></td>
                        <td><?= $model->deliv_date ?></td>
                        <td>
                            <a href="view?id=<?= $model->id ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA9UlEQVR4nO2UPQ4BURSFv0I0hkItsRTDdixAiN5Yhh0IVkBlA7qpGBagUJKXnEhw3/OmmSh8yW3euefe9w9/fp02MAQ2wBG4KY4aGyqnNDVgDFyB+5e4Ktd5ougA+4jC97fYyxukC+SGeQn0gIYiBVZGXq4aJglwMEyjwIQmRv5BtT5YeGbuqANz4AwUQKYxx9rwuVovpJ597UnPDM2NOfoer6v5ZOdJSqSfDe0irenxbss0KAztJK0V0yD9sszM0GbSBjFb5DvklbS6mhTGIW9iDjl0TSf4mZa5pqGHttZtSRQDz8yDD62Sr6KSz66S7/pPdTwA4jXIWC41knQAAAAASUVORK5CYII="></a>
                            <a href="update?id=<?= $model->id ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAcUlEQVR4nO2SOwqAMBAFx89t9DiCxzGlB7HxjBZr4QpBtHJftwNLCIEZWALJRQFWhHLzCY+MwFEFzIMhNH7OikgBdqD3+/SILH/l5vMWCZObzwZ0/j5Ey62KtCq5KdZiKS+5li9kv+VGKkctRy1PeOMEwHpzkejzGi8AAAAASUVORK5CYII="></a>
                            <a href="delete?id=<?= $model->id ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAnElEQVR4nOXQMQ4BURSF4T+htYRZBCV7EOWUojYltRIle2AjLISWnoRkNCrVPedKBH9yy3e+5MG/NAPql5s7Q/Wb7nPAb7ROfM0qAkwTwCQClAmgjAC9BNCNAEUCKCJAA7gZ43egSbCjARwQ2hvATgG2BrBRgKUBLBSgMoCxAgwMoK8AHQNoK0ALuArjl+cbqRFwDoyfgKE6/j09AJFI8b7yqJNqAAAAAElFTkSuQmCC"></a>
                        </td>
                    </tr>
                <?php },
            ]) ?>
        </div>
    </div>
</div>
