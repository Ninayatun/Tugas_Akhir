<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\number\NumberControl;
use kartik\select2\Select2;
use kartik\file\FileInput;
use app\models\Muzaki;
use app\models\JenisZakat;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Zakat */
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

    <div class="zakat-form box box-danger">

    <div class="box-header">
        <h3 class="box-title">Form Zakat</h3>
    </div>

    <div class="box-body">

        <?php if (User::isAdmin()) { ?>

        <?= $form->field($model, 'tanggal')->widget(DatePicker::className(), [
                    'removeButton' => false,
                    'value' => date('Y-m-d'),
                    'options' => ['placeholder' => date('m-d-Y')],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
            ]) ?>


        <?= $form->field($model, 'id_muzaki')->widget(Select2::classname(), [
                'data' =>  Muzaki::getList(),
                'options' => [
                  'placeholder' => '- Pilih Nama Muzaki -',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

        <?= $form->field($model, 'id_jenis_zakat')->widget(Select2::classname(), [
                'data' =>  JenisZakat::getList(),
                'options' => [
                  'placeholder' => '- Pilih Jenis Zakat -',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

        <?= $form->field($model, 'nominal')->widget(NumberControl::classname(), [
            'data' => 'integer-only',
            'maskedInputOptions' => ['digits' => 0],
        ]); ?>

       
        <?php echo $form->field($model, 'status')->dropDownList(
                    ['1' => 'Pending', '2' => 'Approved', '3' => 'Denied']
        ); ?>

        <?php } elseif (User::isMuzaki()) { ?>

        <?= $form->field($model, 'tanggal')->widget(DatePicker::className(), [
                    'removeButton' => false,
                    'value' => date('Y-m-d'),
                    'options' => ['placeholder' => 'Tanggal'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
            ]) ?>


        <?= $form->field($model, 'id_muzaki')->widget(Select2::classname(), [
                'data' =>  Muzaki::getList(),
                'options' => [
                  'placeholder' => '- Pilih Nama Muzaki -',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

        <?= $form->field($model, 'id_jenis_zakat')->widget(Select2::classname(), [
                'data' =>  JenisZakat::getList(),
                'options' => [
                  'placeholder' => '- Pilih Jenis Zakat -',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

        <?= $form->field($model, 'nominal')->widget(NumberControl::classname(), [
            'data' => 'integer-only',
            'maskedInputOptions' => ['digits' => 0],
        ]); ?>

        <?= $form->field($model, 'bukti_pembayaran')->widget(FileInput::classname(), [
               'options' => ['accept'=>'upload/*'],
               'pluginOptions'=>[
                   'allowedFileExtensions'=>['jpg', 'png'], //bentuk file jpg dan png
                   'showUpload' => true,
                   'initialPreview' => [
                       $model->bukti_pembayaran ? Html::img($model->bukti_pembayaran) : null, // checks the models to display the preview
                    ],
                'overwriteInitial' => false,
               ],
        ]); ?>

        <?php } ?>

    </div>
    
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>