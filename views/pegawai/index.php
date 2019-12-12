<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard Admin';
?>

<style>

    @media only screen and (max-width: 480px){ 
        
        .card{
            background:white;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 8px 9px 6px 0px #0000001c;
            margin-bottom:2vh; 
        }

        .backCard h1 {
            margin-top:0px;
            margin-bottom:5px;
        }

        .backCard{
            background:#f9f9f9;
            border-radius: 8px;
            padding: 15px;
            padding-bottom: 40px;
            width: 100%; 
            margin-bottom:5px;
        }

        .marge{
            margin-top:-1vh;
            margin-bottom:2vh;
            color:#acacac;
        }
    }

    @media (min-width: 481px) and (max-width: 768px){ 
        
        .card{
            background:white;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 8px 9px 6px 0px #0000001c; 
        }
        .backCard{
            background:#f9f9f9;
            border-radius: 8px;
            padding: 15px;
            padding-bottom: 40px;
            width: 100%; 
            margin-bottom:5px;
        }

        .marge{
            margin-top:-1vh;
            margin-bottom:2vh;
            color:#acacac;
        }
    }

    @media only screen and (min-width: 769px){ 
        .paddingCard{
            padding-left:2vh;
        }
        .card{
            background:white;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 8px 9px 6px 0px #0000001c; 
        }
        .backCard{
            background:#f9f9f9;
            border-radius: 8px;
            padding: 15px;
            padding-bottom: 40px;
            width: 100%; 
            margin-bottom:5px;
        }

        .marge{
            margin-top:-1vh;
            margin-bottom:4vh;
            color:#acacac;
        }
    }
    div {
        font-family: 'google_font';
    }

</style>
<div class="pegawai-index">
    <div class="backCard">
        <h4 style="color:#245AA7">Hello ! <?php echo $login[0]['nama'];?> </h4>
        <p class="marge">Good morning ! have a nice day</p>
        <div class="row paddingCard">
            <div class="col-md-3 col-sm-4">
                <div class="card">
                    <span class="badge" style="background:#245AA7; width:auto;">Jumlah Pegawai</span>
                    <h1 style="text-align:center;color:#245AA7"><?= $jml_pegawai?> Orang</h1>
                    <p style="font-size:12px; text-align:center;color:#245AA7"> Jumlah pegawai bulan ini</p>
                </div>
            </div>

            <a id="btn" href="#absen">
                <div class="col-md-3 col-sm-4">
                    <div class="card">
                        <span class="badge" style="background:#F96478; width:auto;">Jumlah Absensi</span>
                        <h1 style="text-align:center;color:#F96478"><?= $jml_absensi?> Orang</h1>
                        <p style="font-size:12px; text-align:center;color:#F96478"> Jumlah pegawai yang hadir hari ini</p>
                    </div>
                </div>
            </a>

            <div class="col-md-3 col-sm-4">
                <div class="card">
                    <span class="badge" style="background:#327D4D; width:auto;">Rata-Rata Point</span>
                    <h1 style="text-align:center;color:#327D4D"><?= $dataPoint[0]['rata']?> Point</h1>
                    <p style="font-size:12px; text-align:center;color:#327D4D"> Rata-rata point hari ini.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="backCard" style="width: 100%;">
    <h1 style="text-align:center;">Data Pegawai</h1>
    <p>
        <?= Html::a('+ Pegawai', ['create']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <?= GridView::widget([
        'dataProvider' => $dataProvider, 
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
        

            // 'id_pegawai',
            // 'id_point',
            // 'id_jabatan',
            'nama_pegawai',
            'nomor_telp',
            //'alamat',
            //'email:email',
            //'gender',
            //'password',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> -->
        

  

            <table class="table table-bordered">
                <tr class="bg-primary">
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                <?php
                    foreach($dataPegawai as $row){
                ?>
                    <tr>
                        <td><?=$row['nama_pegawai']?></td>
                        <td><?=$row['nama_jabatan']?></td>
                        <td><?=$row['alamat']?></td>
                        <td><?= Html::a('Update', ['pegawai/update', 'id'=>$row['id_pegawai']],['class'=>'label label-primary']) ?></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>

    <div id="absen" style="width: 100%;">
        <?php
            if(Yii::$app->session->hasFlash('Gagal')){
                echo "<div class='alert alert-danger'>". Yii::$app->session->getFlash('Gagal')."</div>";
            }
            if(Yii::$app->session->hasFlash('Sukses')){
                echo "<div class='alert alert-success'>". Yii::$app->session->getFlash('Sukses')."</div>";
            }
        ?>
        <div class="backCard" style="width: 100%;">
            
        <h1 style="text-align:center;">Data Absensi</h1>
        
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <!-- <?= GridView::widget([
                'dataProvider' => $dataProvider, 
                // 'filterModel' => $searchModel,
                'columns' => [
                    // ['class' => 'yii\grid\SerialColumn'],
                

                    // 'id_pegawai',
                    // 'id_point',
                    // 'id_jabatan',
                    'nama_pegawai',
                    'nomor_telp',
                    //'alamat',
                    //'email:email',
                    //'gender',
                    //'password',

                    // ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?> -->
                

            <table class="table table-bordered">
                <tr class="bg-primary">
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                    foreach($dataAbsensi as $row){
                        if($row['keterangan']==0){
                            $keterangan='Masuk';
                        }else{
                            $keterangan='Izin';
                        }
                ?>
                    <tr>
                        <td><?=$row['id_pegawai']?></td>
                        <td><?=$row['tanggal']?></td>
                        <td><?php echo $keterangan?></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
    const pictureBox = $('#btn');
    const messageBox = $('#absen');

    pictureBox.click(function() {
        $('html, body').animate({
            scrollTop: messageBox.offset().top
            }, 2000);
        })
    })
</script>