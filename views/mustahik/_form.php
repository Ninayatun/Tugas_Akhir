<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\models\JenisMustahik;

/* @var $this yii\web\View */
/* @var $model app\models\Mustahik */
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

    <div class="mustahik-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Mustahik</h3>
    </div>

    <div class="box-body">

    <?= $form->field($model, 'id_jenis_mustahik')->widget(Select2::classname(), [
                'data' =>  JenisMustahik::getList(),
                'options' => [
                  'placeholder' => '- Pilih Nama Mustahik -',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    </div>
    
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>
