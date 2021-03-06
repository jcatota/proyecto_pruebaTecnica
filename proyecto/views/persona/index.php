<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\personaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Personas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Nombre',
            'Apellido',
            'Identificacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
