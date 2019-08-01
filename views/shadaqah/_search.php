<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShadaqahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shadaqah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_shadaqah') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'id_muzaki') ?>

    <?= $form->field($model, 'jumlah_shadaqah') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'bukti_pembayaran') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
