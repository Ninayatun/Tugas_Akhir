<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisMustahik */

$this->title = 'Create Jenis Mustahik';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Mustahiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-mustahik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
