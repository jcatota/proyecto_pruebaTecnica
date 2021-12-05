<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NotasForm */

$this->title = 'Editar nota: ';
$this->params['breadcrumbs'][] = ['label' => 'Notas Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->contenidos_id, 'url' => ['view', 'contenidos_id' => $model->contenidos_id, 'usuarios_cursos_usuarios_id' => $model->usuarios_cursos_usuarios_id, 'usuarios_cursos_cursos_id' => $model->usuarios_cursos_cursos_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notas-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
