<?php
use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Zakat;
use app\models\Infaq;
use app\models\Shadaqah;
use app\models\Pengeluaran;
?>

<h3 align="center">Laporan Keuangan</h3>
<h3 align="center">Yayasan Bina Yatama Al-Iklhas</h3>
<h5 align="center"><?= date('F Y')?></h5>

<hr>

<div align="right"><b><?= date('l, d F Y'); ?></b></div>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>


<b>Pemasukan</b>

<hr>

<table style="margin:auto; width:100%;">
  <tr>
   <td width="70%">Zakat Fitrah</td>
   <td>Rp.</td>
   <td align="right"><?= Yii::$app->formatter->asInteger(Zakat::getNominalFitrahCount()); ?></td>
  </tr>
  <tr>
    <td width="70%">Zakat Penghasilan</td>
    <td>Rp.</td>
    <td align="right"><?= Yii::$app->formatter->asInteger(Zakat::getNominalPenghasilanCount()); ?></td>
  </tr>
 <tr>
    <td width="70%">Zakat Maal</td>
    <td>Rp.</td>
    <td align="right"><?= Yii::$app->formatter->asInteger(Zakat::getNominalMaalCount()); ?></td>
  </tr>
</table>

<hr>

<table style="margin:auto; width:100%;">
  <tr>
    <td width="70%"><b>Jumlah Pemasukan Zakat</b></td>
    <td><b>Rp.</b></td>
    <td align="right"><b><?= Yii::$app->formatter->asInteger(Zakat::getNominalCount()); ?></b></td>
  </tr>
  <tr>
    <td width="70%">Shadaqah</td>
    <td>Rp.</td>
    <td align="right"><?= Yii::$app->formatter->asInteger(Shadaqah::getTotalCount()); ?></td>
  </tr>
  <tr>
    <td width="70%">Infaq</td>
    <td>Rp.</td>
    <td align="right"><?= Yii::$app->formatter->asInteger(Infaq::getTotalCount()); ?></td>
  </tr>
</table>

<hr>

<table style="margin:auto; width:100%;">
  <tr>
    <td width="70%"><b>Jumlah Seluruh Pemasukan</b></td>
    <td><b>Rp.</b></td>
    <td align="right"><b><?= Yii::$app->formatter->asInteger(Shadaqah::getTotalCount() + Infaq::getTotalCount() + Zakat::getNominalCount()); ?></b></td>
  </tr>
</table>

<hr>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<b>Pengeluaran</b>

<hr>

<table style="margin:auto; width:100%;">
  <tr>
   <td width="70%">Jumlah Pengeluaran</td>
   <td>Rp.</td>
   <td align="right"><?= Yii::$app->formatter->asInteger(Pengeluaran::getTotalCount()); ?></td>
  </tr>
</table>

<hr>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<hr>

<table style="margin:auto; width:100%;">
  <tr>
   <td width="70%"><b>Jumlah Khas</b></td>
   <td><b>Rp.</b></td>
   <td align="right"><b><?= Yii::$app->formatter->asInteger((Shadaqah::getTotalCount() + Infaq::getTotalCount() + Zakat::getNominalCount())-Pengeluaran::getTotalCount()); ?></b></td>
  </tr>
</table>