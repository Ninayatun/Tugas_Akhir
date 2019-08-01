<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JenisMustahikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Jenis Mustahik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-mustahik-index box box-primary">

    <div class="box-header">

    <p>
        <?= Html::a('Tambah Jenis Mustahik', ['create'], ['class' => 'btn btn-success']) ?>
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>


</div>
