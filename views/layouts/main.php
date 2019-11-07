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
    <?php $this->head() ?>
    <style>
        @media only screen and (max-width: 768px) {
        /* For mobile phones: */
        [class*="col-md-4"] {
            margin-top: -70px;       
        }
        [class*="box-photo"] {
            width: auto;
        }[class*="box-photo"] #canvas{
            width: 100%;
        }
        }.fontku{
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
        .tombol-ambil-gambar{
            background: none;
            color: gainsboro;
            border: none;
            padding: 0;
            font: inherit;
            margin-top: 10px;
            cursor: pointer;
            outline: inherit;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        select {text-align-last:center; }   
        .top{
            margin-top: 10px;
        }.wrap > .container {
            padding: 0px 0px 0px;
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
            ['label' => 'History','options'=>['class'=>'nav-link'], 'url' => ['/pegawai/index']],
            ['label' => 'Absensi','options'=>['class'=>'nav-link'], 'url' => ['/departemen/index']],
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

        <p class="pull-right">Develop By Gecko Team </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script type="text/javascript">
    var kanvas=$('#canvas');
    kanvas.hide();
    // seleksi elemen video
    var video = document.querySelector("#video-webcam");
    // minta izin user
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
    // jika user memberikan izin
    if (navigator.getUserMedia) {
        // jalankan fungsi handleVideo, dan videoError jika izin ditolak
        navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }
    // fungsi ini akan dieksekusi jika  izin telah diberikan
    function handleVideo(stream) {
        video.srcObject = stream;
    }
    // fungsi ini akan dieksekusi kalau user menolak izin
    function videoError(e) {
        // do something
        alert("Izinkan menggunakan webcam untuk demo!")
    }
    // Draw image
    var context = canvas.getContext('2d');
    capture.addEventListener("click", function() {
        var logo=$('#logo-kadal');
        var ambil=$('#ambil-gambar');
        var kanvas=$('#canvas');
        logo.hide();
        ambil.hide();
        kanvas.show();
        context.drawImage(video, 0, 0, 380, 300);
    });
    $(document).ready(function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
        function showPosition(position) {
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;

        }
        $('#textarea').hide();
    $('#select').change(function() {
    var textarea = $('textarea');
    var select = $('#select').val();
    console.log(select);
        if (select == 'Izin') {
            textarea.show();
        }
        if (select == 'Masuk') {
            textarea.hide();
        }
    });
    });
</script>