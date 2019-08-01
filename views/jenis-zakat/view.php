<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JenisZakat */

$this->title = "Detail Jenis Zakat";
$this->params['breadcrumbs'][] = ['label' => 'Jenis Zakats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jenis-zakat-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Jenis Zakat</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            'nama',
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Jenis Zakat', ['update', 'id' => $model->id_jenis_zakat], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Jenis Zakat', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>


</div>
