<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Notifikasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact box box-danger">

    <div class="box-header">
        <h3 class="box-title">Form Notifikasi</h3>
    </div>

    <div class="box-body">

        <div class="row">
            <div class="col-sm-6">

                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'isi')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Kirim Email', ['class' => 'btn btn-success', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
