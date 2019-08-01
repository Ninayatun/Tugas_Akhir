<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mustahik */

$this->title = "Detail Mustahik";
$this->params['breadcrumbs'][] = ['label' => 'Mustahik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mustahik-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Mustahik</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            [
                'label' => 'Jenis Mustahik',
                'value' => function($data)
                {
                  return $data->jenisMustahik->nama;
                }
            ],
            'alamat',
        ],
    ]) ?>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Mustahik', ['update', 'id' => $model->id_mustahik], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Mustahik', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>
</div>
