<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model app\models\Pengeluaran */
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

<div class="pengeluaran-form box box-danger">

    <div class="box-header">
        <h3 class="box-title">Form Pengeluaran</h3>
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

    <?= $form->field($model, 'total')->widget(NumberControl::classname(), [
        'data' => 'integer-only',
        'maskedInputOptions' => ['digits' => 0],
    ]); ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    </div>

    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>
<?php ActiveForm::end(); ?>