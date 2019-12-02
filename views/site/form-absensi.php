<?php

use app\controllers\SiteController;
use app\models\Absensi;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Absensi Karyawan';
date_default_timezone_set('Asia/Jakarta');
?>
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
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
                if(Yii::$app->session->hasFlash('Gagal')){
                    echo "<div class='alert alert-danger'>". Yii::$app->session->getFlash('Gagal')."</div>";
                }
                if(Yii::$app->session->hasFlash('Sukses')){
                    echo "<div class='alert alert-success'>". Yii::$app->session->getFlash('Sukses')."</div>";
                }
            ?>
        <button type="button" class="tombol-ambil-gambar" data-toggle="modal" data-target="#myModal" >
            <div class="box-photo" onclick="" style=" background-color: #f5f2f254; width: 100%;  line-height: 300px; border-style: dotted; border-color: darkgrey;">
                <img src="img/logo.png" id="logo-kadal" alt="" width="10%">
                <canvas id="canvas" width="380px" height="300px" style="position: relative; display: block; margin: 0 auto;"></canvas>
            </div>
        </button>
        <?php
        $form = ActiveForm::begin([
            'method' => 'post',
            'action' => Url::to(['site/form-absensi']),
        ]);
        /* ADD FORM FIELDS */
        $listData=['Masuk','Izin'];
        echo $form->field($model, 'keterangan')->dropDownList(
            $listData, 
            ['prompt'=>'Keterangan','id'=>'keterangan'],
            array('class'=>'form-control')
            );
        ?>
        <tr>
            <td>
                <?= Html::textArea('detail',"",['id'=>'detail','rows'=>5,'cols'=>50,'class'=>'form-control']) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= Html::textInput('nama_pegawai', Yii::$app->user->identity->username, ['class' => 'form-control']) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= Html::textInput('jam',date('H:i:s') , ['class' => 'form-control']) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= Html::textInput('tanggal',date('Y-m-d') , ['class' => 'form-control']) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= Html::textInput('lat','value' , ['class' => 'form-control','id'=>'latitude']) ?>
            </td>
        </tr>
        <tr>
            <td>
            <?= Html::textInput('long','value', ['class' => 'form-control','id'=>'longitude']) ?>
            </td>
        </tr>
        <tr>
            <td>
            <input type="text" class="form-control" name="canvasImg" id="canvasImg">
            </td>
        </tr>
        <tr>
        <br>
        <?= Html::submitButton('Submit', array('class' => 'btn btn-primary', 'style' => 'width:100%; border-radius:0px;')) ?>
        </tr>
        <?php
        ActiveForm::end();
        ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<!-- modal dialog -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <video autoplay="true" id="video-webcam" width="100%"></video>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="saveImage()" data-dismiss="modal" id="capture" style="display: block; margin-right: auto; margin-left: auto">Ambil!</button>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
//Download Canvas Image
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
        $('.box-photo').css({'line-height': '100%'});
        context.drawImage(video, 0, 0, 380, 300);
        var canvas = document.getElementById('canvas');
        var dataURL = canvas.toDataURL();
        document.getElementById('canvasImg').value = dataURL;
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
        $('#detail').hide();
    $('#keterangan').change(function() {
    var textarea = $('#detail');
    var select = $('#keterangan').val();
    console.log(select);
        if (select == 1) {
            textarea.show();
        }
        if (select == 0) {
            textarea.hide();
        }
    });
    });
</script>