<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisZakat */

$this->title = "Sunting Jenis Zakat";
$this->params['breadcrumbs'][] = ['label' => 'Jenis Zakat', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="jenis-zakat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
