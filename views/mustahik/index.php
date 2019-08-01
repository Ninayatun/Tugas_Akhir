<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\JenisMustahik;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MustahikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Mustahik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mustahik-index box box-primary">

    <div class="box-header">

    <p>
        <?= Html::a('Tambah Mustahik', ['create'], ['class' => 'btn btn-success']) ?>
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
            'nama',
            [
                'attribute' => 'id_jenis_mustahik',
                'value' => function($data)
                {
                  return $data->jenisMustahik->nama;
                }
            ],
            'alamat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
