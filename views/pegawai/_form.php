<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_PEGAWAI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_DEPARTEMEN')->textInput() ?>

    <?= $form->field($model, 'ID_POINT')->textInput() ?>

    <?= $form->field($model, 'NAMA_PEGAWAI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TANGGAL_LAHIR')->textInput() ?>

    <?= $form->field($model, 'ALAMAT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TAHUN_MASUK')->textInput() ?>

    <?= $form->field($model, 'NO_TELP')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
