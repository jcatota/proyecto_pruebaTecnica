<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NotasForm */

$this->title = $model->contenidos_id;
$this->params['breadcrumbs'][] = ['label' => 'Notas Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="notas-form-view">


    <p>
        <?= Html::a('Salir', ['estudiante', 'contenidos_id' => $model->contenidos_id, 'usuarios_cursos_usuarios_id' => $model->usuarios_cursos_usuarios_id, 'usuarios_cursos_cursos_id' => $model->usuarios_cursos_cursos_id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'contenidos.tema',
            'usuariosCursosUsuarios.cursos.curso',
            'usuariosCursosUsuarios.usuarios.personas.Nombre',
            'usuariosCursosUsuarios.usuarios.personas.Apellido',
            'nota',
        ],
    ]) ?>

</div>
