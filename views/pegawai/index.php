<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard Admin';
?>

<style>
    .card{
        background-color: whitesmoke; border-radius: 8px;padding: 15px; 
    }
    div {
        font-family: 'google_font';
    }
</style>
<div class="pegawai-index">
    <div class="card" style="width: 100%; margin-bottom:5px; margin-top:-55px;">
        <div class="row">
            <div class="col-md-3" style="width: 25%;" >
                <div class="card" style="background:white;">
                    <span class="badge badge-info ">Jumlah Pegawai</span>
                    <h1 style="text-align:center"><?= $jml_pegawai?> Orang</h1>
                    <p style="font-size:9px; text-align:right"> jumlah pegawai bulan ini</p>
                </div>
            </div>
            <div class="col-md-3" style="width: 25%;">
                <div class="card" style="background:white;">
                    <p>Nyoba</p>
                </div>
            </div>
            <div class="col-md-3" style="width: 25%;">
                <div class="card" style="background:white;">
                    <p>Nyoba</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="width: 100%;">
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
        

    <table class="table table-bordered table-hover">
        <tr class="bg-primary">
            <th>Nama</th>
            <th>Divisi</th>
            <th>Alamat</th>
        </tr>
        <?php
            foreach($dataPegawai as $row){
        ?>
            <tr>
                <td><?=$row['nama_pegawai']?></td>
                <td><?=$row['nama_jabatan']?></td>
                <td><?=$row['alamat']?></td>
            </tr>
        <?php
            }
        ?>
    </table>
</div>
</div>
