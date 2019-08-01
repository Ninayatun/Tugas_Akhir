<?php

use app\models\Muzaki;
use app\models\Mustahik;
use app\models\Zakat;
use app\models\Infaq;
use app\models\Shadaqah;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = "Halaman Dashboard";
?>

<?php if (User::isAdmin()) { ?>

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
<?php } elseif (User::isMuzaki()) { ?>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Hitung Zakat Penghasilan</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form1" name="form1">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputProfesi1">Pendapatan per bulan (wajib diisi)</label>
                      <input type="text" id="txt1"  class="form-control" placeholder="Rp." onkeyup="sum();" />
                    </div>
                    <div class="form-group">
                      <label for="inputProfesi2">Pendapatan lain (jika ada)</label>
                      <input type="text" id="txt2"  class="form-control" placeholder="Rp." onkeyup="sum();" />
                    </div>
                    <div class="form-group">
                      <label for="hasilProfesi">Zakat Profesi Anda</label>
                      <input type="text" id="txt3" class="form-control" placeholder="Rp."/>
                    </div>


                  </div>
                  <script>
                  function sum() {
                        var txtFirstNumberValue = document.getElementById('txt1').value;
                        var txtSecondNumberValue = document.getElementById('txt2').value;
                        var result = 2.5/100 * parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                        if (!isNaN(result)) {
                           document.getElementById('txt3').value = result;
                        }
                  }
                  </script>
                </form>
              </div>
    </div>
</div>
<div class="row">
 
</div>
<?php } ?>