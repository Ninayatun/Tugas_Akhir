<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shadaqah */

$this->title = "Sunting Shadaqah";
$this->params['breadcrumbs'][] = ['label' => 'Shadaqah', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="shadaqah-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
