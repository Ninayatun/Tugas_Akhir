<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zakat */

$this->title = 'Tambah Zakat';
$this->params['breadcrumbs'][] = ['label' => 'Zakat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zakat-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
