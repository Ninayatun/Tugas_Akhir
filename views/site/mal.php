<?php
use yii\helpers\Html;

$this->title = "Kalkulator Zakat";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Hitung Zakat Maal (Emas, Perak, Permata dan sejenisnya)</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form1" name="form1">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputMal1">Nilai emas, perak, dan/atau permata (wajib diisi)</label>
                      <input type="text" id="txt1"  class="form-control" placeholder="Rp." onkeyup="sum();" />
                    </div>
                    <div class="form-group">
                      <label for="inputMal2">Uang tunai, tabungan, deposito (jika ada)</label>
                      <input type="text" id="txt2"  class="form-control" placeholder="Rp." onkeyup="sum();" />
                    </div>
                    <div class="form-group">
                      <label for="input<al3">Kendaraan, rumah, aset lain (jika ada)</label>
                      <input type="text" id="txt3"  class="form-control" placeholder="Rp." onkeyup="sum();" />
                    </div>
                    <div class="form-group">
                      <label for="inputMal4">Jumlah hutang/cicilan (optional)</label>
                      <input type="text" id="txt4"  class="form-control" placeholder="Rp." onkeyup="sum();" />
                    </div>
                    <div class="form-group">
                      <label for="hasilMal">Zakat Mal Anda</label>
                      <input type="text" id="txt5" class="form-control" placeholder="Rp."/>
                    </div>
                  </div>
                  <script>
                  function sum() {
                        var txtFirstNumberValue = document.getElementById('txt1').value;
                        var txtSecondNumberValue = document.getElementById('txt2').value;
                        var txtThirdNumberValue = document.getElementById('txt3').value;
                        var txtFourNumberValue = document.getElementById('txt4').value;
                        var result = 2.5/100 * (parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue) - parseInt(txtFourNumberValue));
                        if (!isNaN(result)) {
                           document.getElementById('txt5').value = result;
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