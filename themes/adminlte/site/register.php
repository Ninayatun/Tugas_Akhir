<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
$fieldOptions3 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions4 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-home form-control-feedback'></span>"
];

$fieldOptions5 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-phone form-control-feedback'></span>"
];

$fieldOptions6 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <b style="color: #3742fa;">REGISTER</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Silahkan register terlebih dahulu</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

       <?= $form
           ->field($model, 'username', $fieldOptions1)
           ->label(false)
           ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

       <?= $form
           ->field($model, 'password', $fieldOptions2)
           ->label(false)
           ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
       
       <?= $form
           ->field($model, 'nama', $fieldOptions3)
           ->label(false)
           ->textInput(['minlength'=>4,'placeholder' => $model->getAttributeLabel('nama')]) ?>

       <?= $form
           ->field($model, 'alamat', $fieldOptions4)
           ->label(false)
           ->textInput(['minlength'=>6,'placeholder' => $model->getAttributeLabel('alamat')]) ?>

       <?= $form
           ->field($model, 'no_telepon', $fieldOptions5)
           ->label(false)
           ->textInput(['minlength'=>11,'maxlength'=>13,'placeholder' => $model->getAttributeLabel('no_telepon')]) ?>

       <?= $form
           ->field($model, 'email', $fieldOptions6)
           ->label(false)
           ->textInput(['minlength'=>6,'placeholder' => $model->getAttributeLabel('email')]) ?>

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

       <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>

       <div class="row">
           <!-- /.col -->
           <div class="col-xs-4">
               <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
           </div>
           <!-- /.col -->
       </div>


       <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
