<?php
use yii\helpers\Html;

$this->title = "Kalkulator Zakat";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Hitung Zakat Perdagangan</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form1" name="form1">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPerdagangan1">Aset Lancar (Selama 1 Tahun)</label>
                      <input type="text" id="txt1"  class="form-control" placeholder="Rp." onkeyup="sum();" />
                    </div>
                    <div class="form-group">
                      <label for="inputPerdagangan2">Hutang Jangka Pendek (jika ada)</label>
                      <input type="text" id="txt2"  class="form-control" placeholder="Rp." onkeyup="sum();" />
                    </div>
                    <div class="form-group">
                      <label for="hasilPerdagangan">Zakat Perdagangan Anda</label>
                      <input type="text" id="txt3" class="form-control" placeholder="Rp."/>
                    </div>
                  </div>
                  <script>
                  function sum() {
                        var txtFirstNumberValue = document.getElementById('txt1').value;
                        var txtSecondNumberValue = document.getElementById('txt2').value;
                        var result = 2.5/100 * (parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue));
                        if (!isNaN(result)) {
                           document.getElementById('txt3').value = result;
                        }
                  }
                  </script>
                  <div class="box-footer">
                  <?= Html::a('<i class="fa fa-dollar"></i> Bayar Zakat', ['zakat/create'], ['class' => 'btn btn-success btn-flat']) ?>
                  </div>
                </form>
              </div>
    </div>
</div>