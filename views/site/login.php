<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="background">
<div class="container">
    <div class="site-login">
        <div class="col-md-8">
            <img src="img/form.png" class="img" width="100%">
            <h3 style="margin-top: -10px; text-align: center; font-family: 'google_font';">Because Every Seconds Are Matters</h3>
        </div>
        <div class="col-md-4" style="margin-top: 70px;">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"col-lg-offset-1 col-lg-12\">{input} {label}</div>\n<div class=\"col-lg-12\">{error}</div>",
                ]) ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-12">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>