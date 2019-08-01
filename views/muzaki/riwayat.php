<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = "History";
?>
<div class="row">
    <div class="col-md-12" align="center">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h1 class="box-title">Riwayat Pembayaran</h1><br>
                </div>
                <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jenis Zakat</th>
        <th>Nominal</th>
        <th>&nbsp;</th>
    </tr>
    <?php $no=1; foreach ($model->findAllZakat() as $zakat): ?>
    <tr>
        <td><?= $no; ?></td>
        <td><?= $zakat->tanggal?></td>
        <td><?= @$zakat->jenisZakat->nama ?></td>
        <td><?= $zakat->nominal ?></td>
    </tr>
    <?php $no++; endforeach ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        </div>
    </div>
</div>