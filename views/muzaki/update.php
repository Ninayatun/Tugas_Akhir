<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Muzaki */

$this->title = "Sunting Muzaki";
$this->params['breadcrumbs'][] = ['label' => 'Muzakis', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="muzaki-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
