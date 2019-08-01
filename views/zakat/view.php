<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Zakat */

$this->title = "Detail Zakat";
$this->params['breadcrumbs'][] = ['label' => 'Zakat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="zakat-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Zakat</h3>
    </div>

    <div class="box-body">

    <?php if (User::isAdmin()) { ?>

    <?= DetailView::widget([
        'model' => $model,
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
                'label' => 'Jenis Zakat',
                'value' => function($data)
                {
                  return $data->jenisZakat->nama;
                }
            ],
            [
               'label' => 'Nominal',
               'value' => 'Rp. '. $model->nominal
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

    <?php } elseif (User::isMuzaki()) { ?>
      <?= DetailView::widget([
        'model' => $model,
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
                'label' => 'Jenis Zakat',
                'value' => function($data)
                {
                  return $data->jenisZakat->nama;
                }
            ],
            [
               'label' => 'Nominal',
               'value' => 'Rp. '. $model->nominal
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

    <?php } ?>

    </div>

    <?php if (User::isAdmin()) { ?>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Zakat', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Zakat', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>
    <?php } elseif (User::isMuzaki()) { ?>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Zakat', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php } ?>

</div>
