<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Absensi Karyawan';
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

<div class="row" style="height:80vh">
    <div class="col-md-8 text-center" style="background-color:#245AA7; height:100%">
        <img src="img/home.png" alt="home" width="75%" style="margin-top:2vh">
        <h3 style="color:white">Selamat Datang</h3>
        <p style="color:white">Sistem informasi absensi online dengan GPS,
        <br>Anda hanya perlu mengambil gambar 
        <br>terbaru Anda dan menekan tombol absen</p>
    </div>

    <div class="col-md-4">
        <div class="card" style="background-color: whitesmoke;width: 25rem;border-radius: 8px;padding: 12px; 
        box-shadow: 8px 9px 6px 0px #dad9; margin:auto;margin-top:30%">
            <img class="card-img-top" src="img/foto1.jpg" alt="Card image cap" width="100%">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>