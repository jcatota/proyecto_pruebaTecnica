<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosCursosForm */

$this->title = $model->cursos_id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Cursos Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuarios-cursos-form-view">


    <p>
        <?= Html::a('Update', ['update', 'cursos_id' => $model->cursos_id, 'usuarios_id' => $model->usuarios_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'cursos_id' => $model->cursos_id, 'usuarios_id' => $model->usuarios_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realmente deseas eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cursos.curso',
            'usuarios.personas.Nombre','usuarios.personas.Apellido',
        ],
    ]) ?>

</div>
