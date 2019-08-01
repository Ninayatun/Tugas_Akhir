<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Infaq */

$this->title = "Detail Infaq";
$this->params['breadcrumbs'][] = ['label' => 'Infaqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="infaq-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Infaq</h3>
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
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Infaq', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Infaq', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
