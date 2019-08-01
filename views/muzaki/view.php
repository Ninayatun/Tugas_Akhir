<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Muzaki */

$this->title = "Detail Muzaki";
$this->params['breadcrumbs'][] = ['label' => 'Muzakis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="muzaki-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Muzaki</h3>
    </div>

    <div class="box-body">
        <div class="col-sm-12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'nama',
                    'alamat',
                    'no_telepon',
                    'email:email',
                    [
                       'attribute' => 'foto',
                       'format' => 'raw',
                       'value' => function ($model) {
                           if ($model->foto != '') {
                               return Html::img('@web/upload/' . $model->foto, ['class' => 'img-responsive', 'style' => 'height:200px']);
                           } else {
                               return Html::img('@web/upload/no-image.png', ['class' => 'img-responsive', 'style' => 'height:200px']);
                           }
                       },
                   ],
                ],
            ]) ?>
        </div>
    </div>
    <?php if (User::isAdmin()) { ?>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Muzaki', ['update', 'id' => $model->id_muzaki], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Muzaki', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>
    <?php } elseif (User::isMuzaki()) { ?>
        <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Profil', ['update', 'id' => $model->id_muzaki], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>
    <?php } ?>
</div>

<div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Riwayat Pembayaran Zakat</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jenis Zakat</th>
                    <th>Nominal</th>
                </tr>
                <?php $no=1; foreach ($model->findAllZakat() as $zakat): ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $zakat->tanggal ?></td>
                    <td><?= @$zakat->jenisZakat->nama ?></td>
                    <td><?= $zakat->nominal ?></td>
                </tr>
                <?php $no++; endforeach ?>

            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Riwayat Pembayaran Shadaqah</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Shadaqah</th>
                </tr>
                <?php $no=1; foreach ($model->findAllShadaqah() as $shadaqah): ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $shadaqah->tanggal ?></td>
                    <td><?= $shadaqah->jumlah_shadaqah ?></td>
                </tr>
                <?php $no++; endforeach ?>

            </table>
            </div>
            <!-- /.box-body -->
          </div>