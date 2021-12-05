<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RolesForm */

$this->title = 'Editar rol: ' . $model->rol;
$this->params['breadcrumbs'][] = ['label' => 'Roles Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roles-form-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>&nbsp;</p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
