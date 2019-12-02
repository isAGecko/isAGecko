<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.3/bootbox.min.js"></script>
    <?php $this->head() ?>
    <style>
        .fontku{
            font-family: 'google_font';
        }
        .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
            color: #fff;
            background-color: #00a2e9;
            border-radius: 0px;
        
        }.nav-pills > li > a {
            border-radius: 0px; 

        }.nav-pills{
            margin-top: 5px;
        }.navbar-toggle{
            background-color: #00a2e9;
        }
    </style>

</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Gecko Absensi',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-light top fontku',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'nav nav-pills navbar-right'],
        'items' => [
            ['label' => 'Home','options'=>['class'=>'nav-link'], 'url' => ['/site/index']],
            ['label' => 'Absensi','options'=>['class'=>'nav-link'], 'url' => ['/site/form-absensi']],
            ['label' => 'Dashboard','options'=>['class'=>'nav-link'], 'url' => ['/pegawai/index']],
            ['label' => 'History','options'=>['class'=>'nav-link'], 'url' => ['/absensi/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Gecko Inc <?= date('Y') ?></p>

        <p class="pull-right">Develop By isAGecko </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>