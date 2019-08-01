<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengeluaran */

$this->title = "Sunting Pengeluaran";
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pengeluaran-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
