<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Muzaki;
?>

<h3>Password Anda Berhasil di Setting.</h3>
<br>
<br>
<div class="col-xs-4">
    <?= Html::a('Klik disini untuk setting Password', ['site/new-password']); ?>
</div>