<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zakat */

$this->title = "Sunting Zakat";
$this->params['breadcrumbs'][] = ['label' => 'Zakat', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="zakat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
