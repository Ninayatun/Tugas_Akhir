<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shadaqah */

$this->title = 'Tambah Shadaqah';
$this->params['breadcrumbs'][] = ['label' => 'Shadaqah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shadaqah-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
