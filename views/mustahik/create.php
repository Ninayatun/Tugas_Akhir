<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mustahik */

$this->title = 'Tambah Mustahik';
$this->params['breadcrumbs'][] = ['label' => 'Mustahik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mustahik-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
