<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisMustahik */

$this->title = "Sunting Jenis Mustahik";
$this->params['breadcrumbs'][] = ['label' => 'Jenis Mustahik', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="jenis-mustahik-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
