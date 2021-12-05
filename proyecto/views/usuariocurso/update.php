<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosCursosForm */

$this->title = 'Editar inscripciones:';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Cursos Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cursos_id, 'url' => ['view', 'cursos_id' => $model->cursos_id, 'usuarios_id' => $model->usuarios_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-cursos-form-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>&nbsp;</p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
