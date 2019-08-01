<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Infaq */

$this->title = "Sunting Infaq";
$this->params['breadcrumbs'][] = ['label' => 'Infaq', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="infaq-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
