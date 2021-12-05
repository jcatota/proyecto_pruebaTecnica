<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\usuariosCursosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscripciones de cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-cursos-form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Inscribir', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cursos.curso',
            'usuarios.personas.Nombre','usuarios.personas.Apellido',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
