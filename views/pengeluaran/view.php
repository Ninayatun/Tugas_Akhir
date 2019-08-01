<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengeluaran */

$this->title = "Detail Pengeluaran";
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pengeluaran-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Pengeluaran</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'tanggal',
                'format' => 'date',
                'value' => $model->tanggal,
            ],
            [
               'label' => 'Total',
               'value' => 'Rp. '. $model->total
           ],
            'keterangan:ntext',
        ],
    ]) ?>
    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pengeluaran', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pengeluaran', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
