<?php


use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Create Pegawai';
?>
<style>

@media only screen and (max-width: 480px){

    .content-center{
        align-content:center;
    }

    .mt2vh{
        margin-top:2vh;
    }
    .mt2vh2{
        margin-top:2vh;
    }

    .mb7vh{
        margin-bottom:5vh;
    }
    
    .pd1vh{
        padding:1vh;
    }

    .box-left{
        border-color:white;
        border-style:solid;
        border-left-style:none;
        border-right-style:none;
        padding-top:1vh;
    }

    .box-right{
        border-color:white;
        border-style:solid;
        border-right-style:none;
        padding-top:1vh;
    }

    .image{
        width:150px;
        height:150px;
        object-fit:cover;
        border-radius:50%;
        margin-left:11.8vh;
    }
    .card{
        background-color: whitesmoke;
        height:100%; 
        padding:2vh; 
        margin-bottom:2vh; 
    }

    div {
        font-family: 'google_font';
    }
}

@media (min-width: 481px) and (max-width: 768px){



    .mt2vh{
        margin-top:2vh;
    }

    .mb7vh{
        margin-bottom:5vh;
    }
    
    .pd1vh{
        padding:1vh;
    }

    .box-left{
        border-color:white;
        border-style:solid;
        border-left-style:none;
        border-right-style:none;
        padding-top:1vh;
    }

    .box-right{
        border-color:white;
        border-style:solid;
        border-right-style:none;
        padding-top:1vh;
    }

    .image{
        width:150px;
        height:150px;
        object-fit:cover;
        border-radius:50%;
        margin-left:9vh;
    }
    .card{
        background-color: whitesmoke;
        height:100%; 
        padding:2vh; 
        margin-bottom:2vh; 
    }

    div {
        font-family: 'google_font';
    }
}

@media only screen and (min-width: 769px){
    .mt2vh{
        margin-top:2vh;
    }

    .mt2vh2{
        margin-top:2vh;
    }

    .mb7vh{
        margin-bottom:7vh;
    }
    
    .pd1vh{
        padding:1vh;
    }

    .box-left{
        border-color:white;
        border-style:solid;
        border-left-style:none;
        border-right-style:none;
        padding-top:1vh;
    }

    .box-right{
        border-color:white;
        border-style:solid;
        border-right-style:none;
        padding-top:1vh;
    }

    .image{
        width:150px;
        height:150px;
        object-fit:cover;
        border-radius:50%;
        margin-left:6vh;
    }
    .card{
        background-color: whitesmoke;
        height:77.7vh; 
        padding:2vh; 
        margin-bottom:2vh; 
    }

    div {
        font-family: 'google_font';
    }
}
</style>
<div class="pegawai-create">
    <div class="row">
        <?php
                $form= ActiveForm::begin([
                    'method'=>'post',
                    'action'=>Url::to(['pegawai/create']),
                ]);
                ?>
        <div class="col-md-3 col-sm-12 content-center">
            <div class="card" style="height:100%">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <!-- kodingan ngisor seng img tok iki wehi tombol upload foto-->
                            <img src="img/jaya.jpg" class="image" width="80%" alt="tambah foto">
                            
                            <p class="mt2vh">-</p>
                            <div class="row text-center mt2vh">
                                <div class="col-md-6 col-sm-6 col-xs-6 box-left">
                                    <p style="color:#8A8A8A;">-</p>
                                    <p>Divisi</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 box-right">
                                    <p style="color:#8A8A8A;">-</p>
                                    <p>Tim</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 mt2vh2" style="margin-bottom:-15px">
                            <p style="margin:0px;">No. Telp</p>
                            <p style="color:#8A8A8A;padding:1vh">-</p>
                            <p style="margin:0px;">Alamat</p>
                            <p style="color:#8A8A8A;padding:1vh">-</p>
                            <p style="margin:0px;">Email</p>
                            <p class="mb7vh" style="color:#8A8A8A;padding:1vh">-</p>
                            <?= Html::submitButton('Tambah', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9 col-sm-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        
                        <h3>Informasi Pribadi</h3>
                        <p style="color:#8A8A8A;margin-bottom:0.5vh; margin-top:7vh">Alamat</p>
                        <?= $form->field($model,'alamat')->textInput()->label(false) ?>
                        <p style="color:#8A8A8A;margin-bottom:0.5vh;margin-top:3vh">Jenis Kelamin</p>
                        <?= $form->field($model,'gender')->dropdownList([
                            'Laki-Laki' => 'Laki-Laki', 
                            'Perempuan' => 'Perempuan'
                        ],
                        ['class'=>'form-control','prompt'=>'Select Gender']
                        )->label(false) ?>
                        <p style="color:#8A8A8A;margin-bottom:0.5vh;margin-top:3vh">Email</p>
                        <?= $form->field($model,'email')->textInput()->label(false) ?>
                        <p style="color:#8A8A8A;margin-bottom:0.5vh;margin-top:3vh">No. Telp</p>
                        <?= $form->field($model,'nomor_telp')->textInput()->label(false) ?>
                    </div>
                </div>
            
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <h3>Informasi Kantor</h3>
                        <p style="color:#8A8A8A;margin-bottom:0.5vh; margin-top:7vh">Nama Lengkap</p>
                        <?= $form->field($model,'nama')->textInput()->label(false) ?>
                        <p style="color:#8A8A8A;margin-bottom:0.5vh; margin-top:3vh">Username</p>
                        <?= $form->field($model,'nama_pegawai')->textInput()->label(false) ?>
                        <p style="color:#8A8A8A;margin-bottom:0.5vh; margin-top:3vh">Password</p>
                        <?= $form->field($model,'password')->passwordInput()->label(false) ?>
                        <div class="form-group field-pegawai-id_jabatan required">
                        <!-- <label class="control-label" for="pegawai-id_jabatan">Devisi</label> -->
                        <p style="color:#8A8A8A;margin-bottom:0.5vh; margin-top:3vh">Divisi</p>
                        <select class="form-control" id="pegawai-id_jabatan" name="Pegawai[id_jabatan]">
                                        
                                        <?php
                                            foreach($dataJabatan as $jbt){
                                        ?>
                                            <option value= <?=$jbt['id_jabatan']?>><?=$jbt['nama_jabatan']?></option>
                                        <?php
                                            }
                                        ?>
                        </select>
                        <p style="color:#8A8A8A;margin-bottom:0.5vh; margin-top:3vh">Role</p>
                        <?php
                            $listData=['Admin','User'];
                            echo $form->field($model, 'role')->dropDownList(
                                $listData, 
                                ['prompt'=>'Role','id'=>'role'],
                                array('class'=>'form-control')
                                )->label(false);
                        ?>
                        <div class="help-block"></div>
                        </div>
                        
                        
                        
                        <!-- <?php
                            foreach($dataJabatan as $jbtn){
                        ?>
                        <?= $form->field($model,'id_jabatan')->dropdownList([
                            
                                $jbtn['id_jabatan'] => $jbtn['nama_jabatan'] 
                                
                            ],
                            ['class'=>"form-control",'prompt'=>'Pilih Jabatan']
                        ); ?>
                        <?php
                            }
                        ?> -->
                    </div>
                </div>
            </div>
        </div>
        <?php
            ActiveForm::end();
        ?>
    </div>
</div>
