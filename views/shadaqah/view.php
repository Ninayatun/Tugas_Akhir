<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Shadaqah */

$this->title = "Detail Shadaqah";
$this->params['breadcrumbs'][] = ['label' => 'Shadaqah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="shadaqah-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Shadaqah</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'tanggal',
                'format' => 'date',
                'value' => $model->tanggal,
            ],
            [
                'label' => 'Muzaki',
                'value' => function($data)
                {
                  return $data->muzaki->nama;
                }
            ],
            [
               'label' => 'Jumlah Shadaqah',
               'value' => 'Rp. '. $model->jumlah_shadaqah
           ],
            [
                'label' => 'Status',
                'value' => function ($model){
                    if ($model->status == 1) {
                        return "Pending";
                    };
                    if ($model->status == 2) {
                        return "Approved";
                    };
                    if ($model->status == 3) {
                        return "Denied";
                    };
                }
           ],
            [
                       'attribute' => 'bukti_pembayaran',
                       'format' => 'raw',
                       'value' => function ($model) {
                           if ($model->bukti_pembayaran != '') {
                               return Html::img('@web/upload/' . $model->bukti_pembayaran, ['class' => 'img-responsive', 'style' => 'height:200px']);
                           } else {
                               return Html::img('@web/upload/no-image.png', ['class' => 'img-responsive', 'style' => 'height:200px']);
                           }
                       },
                   ],
        ],
    ]) ?>

    </div>

    <?php if (User::isAdmin()) { ?>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Shadaqah', ['update', 'id' => $model->id_shadaqah], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Shadaqah', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>
    <?php } elseif (User::isMuzaki()) { ?>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Shadaqah', ['update', 'id' => $model->id_shadaqah], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php } ?>

</div>
