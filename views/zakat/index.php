<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\JenisZakat;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ZakatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Zakat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zakat-index box box-danger">

    <div class="box-header">

    <p>
        <?= Html::a('Tambah Zakat', ['create'], ['class' => 'btn btn-success']) ?>

        <!-- <?= Html::a('<i class="fa fa-print"></i> Export Pdf', ['zakat/export-pdf'], ['class' => 'btn btn-danger btn-flat']); ?> -->
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
                'contentOptions' => ['style' => 'text-align:center'],
            ],
            [
                'attribute' => 'tanggal',
                'format' => 'date',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
            ],
            [
                'attribute' => 'id_muzaki',
                'value' => function($data)
                {
                  return $data->muzaki->nama;
                }
            ],
            [
                'attribute' => 'id_jenis_zakat',
                'format' => 'raw',
                'filter' => JenisZakat::getList(),
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function ($data) {
                    return @$data->jenisZakat->nama;
                }
            ],
            [
                'attribute' => 'nominal',
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

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>
    </div>


</div>
