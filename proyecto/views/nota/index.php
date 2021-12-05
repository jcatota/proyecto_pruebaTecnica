<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\notaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notas-form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Calificar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            
            'contenidos.tema',
            'usuariosCursosUsuarios.cursos.curso',
            'usuariosCursosUsuarios.usuarios.personas.Nombre',
            'usuariosCursosUsuarios.usuarios.personas.Apellido',
            'nota',

            ['class' => 'yii\grid\ActionColumn',],
        ],
    ]); ?>


</div>
