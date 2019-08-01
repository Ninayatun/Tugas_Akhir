<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JenisMustahik */

$this->title = "Detail Jenis Mustahik";
$this->params['breadcrumbs'][] = ['label' => 'Jenis Mustahik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jenis-mustahik-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Mustahik</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
        ],
    ]) ?>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Mustahik', ['update', 'id' => $model->id_jenis_mustahik], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Mustahik', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>
</div>
