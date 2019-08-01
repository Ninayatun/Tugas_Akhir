<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MuzakiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Muzaki';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muzaki-index box box-primary">

    <div class="box-header">

    <p>
        <?= Html::a('Tambah Muzaki', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    </div>

    <div class="box-body">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'alamat',
            'no_telepon',
            'email',
            //'email:email',
            //'foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>