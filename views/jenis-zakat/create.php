<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisZakat */

$this->title = 'Tambah Jenis Zakat';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Zakats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-zakat-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
