<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Artikel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-index box box-danger">

    <div class="box-header">

    <p>
        <?= Html::a('Tambah Artikel', ['create'], ['class' => 'btn btn-success']) ?>
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
            'judul',
            'isi:ntext',
            // 'gambar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
