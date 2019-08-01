<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Infaq */

$this->title = 'Tambah Infaq';
$this->params['breadcrumbs'][] = ['label' => 'Infaqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="infaq-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
