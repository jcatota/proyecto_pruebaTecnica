<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContenidosForm */

$this->title = 'Editar Contenidos';
$this->params['breadcrumbs'][] = ['label' => 'Contenidos Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contenidos-form-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>&nbsp;</p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
