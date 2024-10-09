<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <div class="container">
        <a href='<?= Yii::$app->homeUrl ?>' class="logo">    
            <h1>AstraFish</h1>
            <span>администрирование</span>
        </a>
        <nav>
            <ul>
                <li><a href="/gds/index">Товары</a></li>
                <li><a href="/categories/index">Категории</a></li>
                <li><a href="/suppliers/index">Поставщики</a></li>
                <li><a href="/clients/index">Клиенты</a></li>
                <li><a href="/staff/index">Сотрудники</a></li>
                <li><a href="/distributions/index">Покупки</a></li>
                <li><a href="/refunds/index">Возвраты</a></li>
                <li><a href="/users/index">Пользователи</a></li>
            </ul>
        </nav>
        <?php if (Yii::$app->user->isGuest) {?>
            <a href='/users/login' class="user-profile-link">
                <svg style='margin-top: -3px;' width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.5 11.831l-7 3.669S3 17 3.61 18.606C4.22 20.212 5 20.5 6.5 20.5h11c1.5 0 2.28-.29 2.89-1.895C21 17 21.5 15.5 21.5 15.5l-7-3.669m2.668 1.399C16 14.7 13.923 15.5 12.02 15.5a7.12 7.12 0 0 1-3.32-.8M17 7.5a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" stroke="#000"></path></svg>
                <span>Войти</span>
            </a>
        <?php } else{?>
            <a href='/users/logout' class="user-profile-link">
                <svg style='margin-top: -3px;' width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.5 11.831l-7 3.669S3 17 3.61 18.606C4.22 20.212 5 20.5 6.5 20.5h11c1.5 0 2.28-.29 2.89-1.895C21 17 21.5 15.5 21.5 15.5l-7-3.669m2.668 1.399C16 14.7 13.923 15.5 12.02 15.5a7.12 7.12 0 0 1-3.32-.8M17 7.5a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" stroke="#000"></path></svg>
                <span>Выйти</span>
            </a>
        <?php } ?>
    </div>
    
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
