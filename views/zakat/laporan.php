<?php

use app\models\Zakat;
use app\models\Infaq;
use app\models\Shadaqah;
use app\models\Pengeluaran;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "LAPORAN";
?>

<div class="box-body box box-danger">
	<div class="row">

		<div class="col-xs-12">
			<h4>Laporan Pemasukan Zakat</h4>
		</div>

		<!-- Main content -->
	    <section class="content">

	      <div class="row">
	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Zakat Fitrah</span>
	              <span class="info-box-number"><?= Yii::$app->formatter->asInteger(Zakat::getFitrahCount()); ?></span>
	              <a href="<?=Url::to(['zakat/export-pdf-fitrah']);?>" class="small-box-footer"><i class="fa fa-print"></i> Cetak Laporan</a>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	        <!-- /.col -->
	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Zakat Penghasilan</span>
	              <span class="info-box-number"><?= Yii::$app->formatter->asInteger(Zakat::getPenghasilanCount()); ?></span>
	              <a href="<?=Url::to(['zakat/export-pdf-penghasilan']);?>" class="small-box-footer"><i class="fa fa-print"></i> Cetak Laporan</a>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	        <!-- /.col -->
	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Zakat Maal</span>
	              <span class="info-box-number"><?= Yii::$app->formatter->asInteger(Zakat::getMaalCount()); ?></span>
	              <a href="<?=Url::to(['zakat/export-pdf-maal']);?>" class="small-box-footer"><i class="fa fa-print"></i> Cetak Laporan</a>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	        <!-- /.col -->
	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-red"><i class="fa fa-dollar"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Semua Jenis Zakat</span>
	              <span class="info-box-number"><?= Yii::$app->formatter->asInteger(Zakat::getCount()); ?></span>
	              <a href="<?=Url::to(['zakat/export-pdf']);?>" class="small-box-footer"><i class="fa fa-print"></i> Cetak Laporan</a>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	        <!-- /.col -->
	      </div>

	      <div class="row">
	      	<div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-orange"><i class="fa fa-money"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Infaq</span>
	              <span class="info-box-number"><?= Yii::$app->formatter->asInteger(Infaq::getTotalCount()); ?></span>
	              <a href="<?=Url::to(['infaq/export-pdf']);?>" class="small-box-footer"><i class="fa fa-print"></i> Cetak Laporan</a>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>

	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-purple"><i class="fa fa-money"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Shadaqah</span>
	              <span class="info-box-number"><?= Yii::$app->formatter->asInteger(Shadaqah::getTotalCount()); ?></span>
	              <a href="<?=Url::to(['shadaqah/export-pdf']);?>" class="small-box-footer"><i class="fa fa-print"></i> Cetak Laporan</a>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>

	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-blue"><i class="fa fa-money"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Pemasukan</span>
	              <span class="info-box-number"><?= Yii::$app->formatter->asInteger(Shadaqah::getTotalCount() + Infaq::getTotalCount() + Zakat::getNominalCount()); ?></span>
	              <a href="<?=Url::to(['site/export-pdf']);?>" class="small-box-footer"><i class="fa fa-print"></i> Cetak Laporan</a>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>

	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-olive"><i class="fa fa-money"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Pengeluaran</span>
	              <span class="info-box-number"><?= Yii::$app->formatter->asInteger(Pengeluaran::getTotalCount()); ?></span>
	              <a href="<?=Url::to(['pengeluaran/export-pdf']);?>" class="small-box-footer"><i class="fa fa-print"></i> Cetak Laporan</a>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	      </div>
	      <!-- /.row -->
	      <div class="row">
	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-maroon"><i class="fa fa-dollar"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Laporan Keuangan</span>
	              <span class="info-box-number"><?= Yii::$app->formatter->asInteger((Shadaqah::getTotalCount() + Infaq::getTotalCount() + Zakat::getNominalCount())-Pengeluaran::getTotalCount()); ?></span>
	              <a href="<?=Url::to(['site/export-pdf-keuangan']);?>" class="small-box-footer"><i class="fa fa-print"></i> Cetak Laporan</a>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	    </div>
		</section>
	      <!-- =========================================================== -->
</div>
</div>