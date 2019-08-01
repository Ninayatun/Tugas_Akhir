<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mustahik */

$this->title = "Sunting Mustahik";
$this->params['breadcrumbs'][] = ['label' => 'Mustahik', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="mustahik-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
