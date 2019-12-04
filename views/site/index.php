<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Absensi Karyawan';
if(empty($rows)){
    $jam=0;
    $tanggal=0;
    $point=0;
    $image='foto1.jpg';
}else{
    $jam=$rows[0]['jam'];
    $tanggal=$rows[0]['tanggal'];
    $point=$rows[0]['point'];
    $image=$rows[0]['foto'];
}
?>
<style>
    /* @media only screen and (max-width: 768px) { */
    /* For mobile phones: */
        /* [class*="col-md-4"] {
            margin-top: -70px;       
        }
        [class*="box-photo"] {
            width: auto;
        }[class*="box-photo"] #canvas{
            width: 100%;
        }
    }
    .fontku{
        font-family: 'google_font';
    }
    .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
        color: #fff;
        background-color: #00a2e9;
        border-radius: 0px;
     */
    /* }.nav-pills > li > a {
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
    } */

    @media only screen and (max-width: 480px){
        .tinggi{
            height:50vh;
        }

        .tinggi1{
            height:20vh;
        }

        .cards {
            background-color: whitesmoke; width: 25rem;padding: 12px; 
            box-shadow: 8px 9px 6px 0px #00000042; margin: 0;
            display: flex;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width:90%;
        }

        .center{
            margin:auto;
            margin-left: 15px;
            border-left-color: black;
            border: black;
            border-left-style: solid;
            padding: 15px;
            border-color:#c2c2c2;
            border-width: medium;
        }
    }

    @media (min-width: 481px) and (max-width: 769px){
        .tinggi{
            height:55vh;
        }

        .tinggi1{
            height:15vh;
        }

        .cards {
            background-color: whitesmoke; width: 25rem;padding: 12px; 
            box-shadow: 8px 9px 6px 0px #00000042; margin: 0;
            display: flex;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width:50%;
        }

        .center{
            margin:auto;
            margin-left: 15px;
            border-left-color: black;
            border: black;
            border-left-style: solid;
            padding: 15px;
            border-color:#c2c2c2;
            border-width: medium;
        }
    }

    @media only screen and (min-width: 769px){
        .tinggi{    
            height:80vh;
        }

        .tinggi1{
            height:80vh;
        }

        .cards {
            background-color: whitesmoke; width: 25rem;padding: 15px; 
            box-shadow: 8px 9px 6px 0px #00000042; margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        
        .center{
            margin:auto;
            margin-top: 15px;
            border-top-color: black;
            border: black;
            border-top-style: solid;
            border-color:#c2c2c2;
            border-width: medium;
        }

    }

    div {
        font-family: 'google_font';
    }
    </style>
<?php
?>
<div class="row" style="margin-top:-10vh">
    <div class="col-md-8 text-center tinggi" style="background-color:#245AA7;">
        <img src="img/home.png" alt="home" width="75%" style="margin-top:2vh">
        <h3 style="color:white">Selamat Datang</h3>
        <p style="color:white">Sistem informasi absensi online dengan GPS,
        <br>Anda hanya perlu mengambil gambar 
        <br>terbaru Anda dan menekan tombol absen</p>
    </div>

    <div class="col-md-4 tinggi1">
        <div class="cards">
            <img class="card-img-top" src="img/foto_absen/<?php echo $image ?>" alt="Card image cap" width="100%">
            <div class="center">
                <h5><?php echo"Tanggal: ". $tanggal; ?></h5>
                <p>Anda Absen pada jam: <?php echo $jam ?> dan Anda mendapatkan Point: <?php echo $point ?> .</p>
                <!-- <a href="#" class="btn btn-primary">Detail!</a> -->
            </div>
        </div>
    </div>
</div>