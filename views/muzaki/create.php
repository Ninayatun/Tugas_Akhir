<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Muzaki */

$this->title = 'Tambah Muzaki';
$this->params['breadcrumbs'][] = ['label' => 'Muzakis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muzaki-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
