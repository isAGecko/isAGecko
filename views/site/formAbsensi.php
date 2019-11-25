<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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
<div class="container">
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <button type="button" class="tombol-ambil-gambar" data-toggle="modal" data-target="#myModal" >
            <div class="box-photo" onclick="" style=" background-color: #f5f2f254; width: 100%;  line-height: 300px; border-style: dotted; border-color: darkgrey;">
                <img src="img/logo.png" id="logo-kadal" alt="" width="10%">
                <canvas id="canvas" width="380px" height="300px" style="position: relative; display: block; margin: 0 auto;"></canvas>
            </div>
        </button>
    </div>
    <div class="col-md-2">
    </div>
</div>
<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table width="100%">
        <?= Html::beginForm(['/proses-absensi'], 'post', ['enctype' => 'multipart/form-data']) ?>
                <tr>
                    <td>
                        <select id="select" name="keterangan" class="form-control" style="border-radius: 0px;">
                            <option value="Masuk" selected>----- Keterangan -----</option>
                            <option value="Masuk">Masuk</option>
                            <option value="Izin">Izin</option>
                        </select>
                    </td>
                </tr>
                <tr></tr>
                <br>
                <tr>
                    <td>
                        <input type="text" name="lat" value="<?php echo date('Y-m-d'); ?>" placeholder="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="lat" value="<?php echo date('H:i:s'); ?>" placeholder="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="lat" value="<?php echo Yii::$app->user->identity->username ?>" placeholder="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="lat" value="" placeholder="" id="latitude" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="long" value="" placeholder="" id="longitude" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <textarea id="textarea" name="detail" wrap="VIRTUAL" class="form-control" cols="50" rows="5" placeholder="Masukkan keterangan kenapa Anda tidak Masuk Kerja: cth: sakit, kunjungan kerja dll"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <?= Html::submitButton('Submit', array('class' => 'btn btn-primary', 'style' => 'width:100%; border-radius:0px;')) ?>
                    </td>
                </tr>
                <?= Html::endForm() ?>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="capture" style="display: block; margin-right: auto; margin-left: auto">Ambil!</button>
            </div>
        </div>
    </div>
</div>
</div>
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
        $('.box-photo').css({'line-height': '100%'});
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