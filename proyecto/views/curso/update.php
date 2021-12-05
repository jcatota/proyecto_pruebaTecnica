<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CursosForm */

$this->title = 'Editar Cursos';
$this->params['breadcrumbs'][] = ['label' => 'Cursos Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursos-form-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>&nbsp;</p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
