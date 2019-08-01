<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PengeluaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pengeluaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengeluaran-index box box-danger">

    <div class="box-header">

    <p>
        <?= Html::a('Tambah Pengeluaran', ['create'], ['class' => 'btn btn-success']) ?>
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
            'total',
            'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
