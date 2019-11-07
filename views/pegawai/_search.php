<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_PEGAWAI') ?>

    <?= $form->field($model, 'ID_DEPARTEMEN') ?>

    <?= $form->field($model, 'ID_POINT') ?>

    <?= $form->field($model, 'NAMA_PEGAWAI') ?>

    <?= $form->field($model, 'TANGGAL_LAHIR') ?>

    <?php // echo $form->field($model, 'ALAMAT') ?>

    <?php // echo $form->field($model, 'TAHUN_MASUK') ?>

    <?php // echo $form->field($model, 'NO_TELP') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
