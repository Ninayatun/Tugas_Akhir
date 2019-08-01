<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Artikel */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'layout'=>'horizontal',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ]
    ]); ?>

<div class="artikel-form box box-danger">

    <div class="box-header">
        <h3 class="box-title">Form Artikel</h3>
    </div>

    <div class="box-body">
    <?= $form->field($model, 'tanggal')->widget(DatePicker::className(), [
                'removeButton' => false,
                'value' => date('Y-m-d'),
                'options' => ['placeholder' => 'Tanggal'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]) ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gambar')->widget(FileInput::classname(), [
           'options' => ['accept'=>'upload/*'],
           'pluginOptions'=>[
               'allowedFileExtensions'=>['jpg', 'png'], //bentuk file jpg dan png
               'showUpload' => true,
               'initialPreview' => [
                   $model->gambar ? Html::img($model->gambar) : null, // checks the models to display the preview
               ],
               'overwriteInitial' => false,
           ],
       ]); ?>
  </div>
  <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
