<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShadaqahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Shadaqah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shadaqah-index box box-danger">

    <div class="box-header">

    <p>
        <?= Html::a('Tambah Shadaqah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    </div>

    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'tanggal',
                'format' => 'date',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'id_muzaki',
                'value' => function($data)
                {
                  return $data->muzaki->nama;
                }
            ],
            [
                'attribute' => 'jumlah_shadaqah',
                'headerOptions' => ['style' => 'text-align:center', 'width' => '200px'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'status',
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
            //'bukti_pembayaran',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
