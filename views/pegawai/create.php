<?php


use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Create Pegawai';
?>
<style>
    .card{
        background-color: whitesmoke; border-radius: 8px;padding: 15px; 
    }
    div {
        font-family: 'google_font';
    }
</style>
<div class="pegawai-create">
    <div class="row" style="">
        <?php
                $form= ActiveForm::begin([
                    'method'=>'post',
                    'action'=>Url::to(['pegawai/create']),
                ]);
                ?>
        <div class="col-md-3">
            <div class="card" style="height:60vh;">
            <div class="form-group">
                        <?= Html::submitButton('Tambah', ['class' => 'btn btn-primary']) ?>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="height:60vh; padding:5vh;">
                
                <h3>Informasi Pribadi</h3>
                <?= $form->field($model,'alamat')->textInput()->label('Alamat') ?>
                <?= $form->field($model,'gender')->dropdownList([
                    'Laki-Laki' => 'Laki-Laki', 
                    'Perempuan' => 'Perempuan'
                ],
                ['class'=>'form-control','prompt'=>'Select Gender']
                )->label('Jenis Kelamin') ?>
                <?= $form->field($model,'email')->textInput()->label('Email') ?>
                <?= $form->field($model,'nomor_telp')->textInput()->label('No_Telp') ?>
                
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="height:60vh; padding:5vh;">
                

                <h3>Informasi Kantor</h3>
                <?= $form->field($model,'nama_pegawai')->textInput()->label('Username') ?>
                <?= $form->field($model,'password')->passwordInput()->label('Password') ?>
                <?= $form->field($model,'id_point')->textInput()->label('Id Point') ?>
                <div class="form-group field-pegawai-id_jabatan required">
                <label class="control-label" for="pegawai-id_jabatan">Devisi</label>
                <select class="form-control" id="pegawai-id_jabatan" name="Pegawai[id_jabatan]">
                                
                                <?php
                                    foreach($dataPegawai as $row){
                                ?>
                                    <option value= <?=$row['id_jabatan']?>><?=$row['nama_jabatan']?></option>
                                <?php
                                    }
                                ?>
                                </select>
                <div class="help-block"></div>
                </div>
                
                
                
                <!-- <?php
                    foreach($dataPegawai as $row){
                ?>
                <?= $form->field($model,'id_jabatan')->dropdownList([
                    
                        $row['id_jabatan'] => $row['nama_jabatan'] 
                        
                    ],
                    ['class'=>"form-control",'prompt'=>'Pilih Jabatan']
                ); ?>
                <?php
                    }
                ?> -->
            </div>
        </div>
        <?php
            ActiveForm::end();
        ?>
    </div>
</div>
