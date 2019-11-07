<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DepartemenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departemen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_DEPARTEMEN') ?>

    <?= $form->field($model, 'ID_PEGAWAI') ?>

    <?= $form->field($model, 'NAMA_DEPARTEMEN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
