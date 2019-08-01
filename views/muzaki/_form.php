<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Muzaki */
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

<div class="muzaki-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Muzaki</h3>
    </div>

    <div class="box-body">

    

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->widget(FileInput::classname(), [
           'options' => ['accept'=>'upload/*'],
           'pluginOptions'=>[
               'allowedFileExtensions'=>['jpg', 'png'], //bentuk file jpg dan png
               'showUpload' => true,
               'initialPreview' => [
                   $model->foto ? Html::img($model->foto) : null, // checks the models to display the preview
               ],
               'overwriteInitial' => false,
           ],
       ]); ?>

    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>
    </div>
</div>
<?php ActiveForm::end(); ?>