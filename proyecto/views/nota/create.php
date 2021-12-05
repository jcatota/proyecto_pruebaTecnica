<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NotasForm */

$this->title = 'Create Notas Form';
$this->params['breadcrumbs'][] = ['label' => 'Notas Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notas-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
