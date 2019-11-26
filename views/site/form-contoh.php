<?php

use app\controllers\SiteController;
use app\models\Absensi;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-6">
    <?php
    $form = ActiveForm::begin([
        'id' => 'active-form',
        'options' => [
            'class' => 'form-group',
            'enctype' => 'multipart/form-data',
            'action' => Url::to(['site/form-absensi']),
        ],
    ]);
    /* ADD FORM FIELDS */
    $listData=['Masuk','Izin'];
    echo $form->field($model, 'name')->dropDownList(
        $listData, 
        ['prompt'=>'Keterangan']
        );
    ActiveForm::end();
    ?>
    </div>
</div>