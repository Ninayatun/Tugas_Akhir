<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengeluaran */

$this->title = 'Form Pengeluaran';
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengeluaran-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
