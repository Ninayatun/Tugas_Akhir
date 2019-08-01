<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Artikel */

$this->title = "Detail Artikel";
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="artikel-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Zakat</h3>
    </div>

    <div class="box-body">
      <div class="col-sm-6">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'tanggal',
                'judul',
                'isi:ntext',
            ],
        ]) ?>
      </div>
      <div class="col-sm-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
              [
                           'attribute' => 'gambar',
                           'format' => 'raw',
                           'value' => function ($model) {
                               if ($model->gambar != '') {
                                   return Html::img('@web/upload/' . $model->gambar, ['class' => 'img-responsive', 'style' => 'height:200px']);
                               } else {
                                   return Html::img('@web/upload/no-images.png', ['class' => 'img-responsive', 'style' => 'height:500px']);
                               }
                           },
                       ],
            ],
        ]) ?>
      </div>

  </div>
  

  <?php if (User::isAdmin()) { ?>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Artikel', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Artikel', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>
  <?php } ?>

</div>
