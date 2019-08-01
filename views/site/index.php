<?php

use app\models\Muzaki;
use app\models\Mustahik;
use app\models\Zakat;
use app\models\Infaq;
use app\models\Shadaqah;
use app\models\User;
use app\models\JenisZakat;
use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;

?>

<?php if (User::isAdmin()) { ?>
<?php $this->title = 'Halaman Dashboard'; ?>

<div class="row">

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <p>Total Zakat</p>

                <h3><?= Yii::$app->formatter->asInteger(Zakat::getNominalCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <a href="<?=Url::to(['zakat/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <p>Total Infaq</p>

                <h3><?= Yii::$app->formatter->asInteger(Infaq::getTotalCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <a href="<?=Url::to(['infaq/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>


    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <p>Total Shadaqah</p>

                <h3><?= Yii::$app->formatter->asInteger(Shadaqah::getTotalCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <a href="<?=Url::to(['shadaqah/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <p>Total Pemasukan</p>

                <h3><?= Yii::$app->formatter->asInteger(Shadaqah::getTotalCount() + Infaq::getTotalCount() + Zakat::getNominalCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <a href="<?=Url::to(['pemasukan/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
      <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Zakat Berdasarkan Jenis</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
            </div>
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'Jenis Zakat'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'JenisZakat',
                                'data' => JenisZakat::getGrafikList(),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Pemasukan Zakat</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
            </div>
            <div class="box-body">
                <?= \miloschuman\highcharts\Highcharts::widget([
                    'options' => [
                        'credits' => true,
                        'title' => ['text' => 'Jumlah Data Zakat Masuk'],
                        'exporting' => ['enabled' => true],
                        'xAxis' => [
                            'categories' => \app\components\Helper::getListBulanGrafik(),
                        ],
                        'series' => [
                            [
                                'type' => 'column',
                                'colorByPoint' => true,
                                'name' => 'Zakat',
                                'data' => \app\models\Zakat::getCountGrafik(),
                                'showInLegend' => false
                            ],
                        ],
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Daftar Pembayaran Terbaru.
                    </h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-stripped">
                        <thead class="">
                            <tr>
                                <th width="55px" class="text-center">No</th>
                                <th class="text-center">Muzaki</th>
                                <th class="text-center">Tanggal</th>
                                <th width="85px" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                            <?php foreach (Zakat::find()->orderBy(['tanggal' =>  SORT_DESC])->limit(3)->all() as $zakat): ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td class="text-center"><?= $zakat->muzaki->nama ?></td>
                                <td class="text-center"><?= $zakat->tanggal ?></td>
                                <td class="text-center"><?= $zakat->status ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php } elseif (User::isMuzaki()) { ?>
<?php $this->title = 'Halaman Artikel'; ?>
<div class="box-body box box-danger">
<div class="row">
   <?php foreach ($provider->getModels() as $artikel) {?>
       <!-- Kolom box mulai -->
       <div class="col-md-4">
           <!-- Box mulai -->
           <div class="box box-widget">

               <div class="box-header with-border">
                   <div class="user-block">
                       <img class="img-circle" src="<?= Yii::getAlias('@web').'/img/artikel.png'; ?>" alt="User Image">
                       <span class="username"><?= Html::a($artikel->judul, ['artikel/view', 'id' => $artikel->id]); ?></span>
                       <span class="description"> Di Terbitkan : <?= $artikel->tanggal; ?></span>
                   </div>
                   <div class="box-tools">
                       <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read"><i class="fa fa-circle-o"></i></button>
                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                       <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                   </div>
               </div>

               <div class="box-body">
                   <img style="height: 300px;" class="img-responsive pad" src="<?= Yii::$app->request->baseUrl.'/upload/'.$artikel['gambar']; ?>" alt="Photo">
                   <?= Html::a("<i class='fa fa-eye'> Detail artikel</i>",["artikel/view","id"=>$artikel->id],['class' => 'btn btn-default']) ?>
                </div>
           </div>
           <!-- Box selesai -->
       </div>
       <!-- Kolom box selesai -->  
   <?php
       }
   ?>
</div>
</div>
<?php } ?>