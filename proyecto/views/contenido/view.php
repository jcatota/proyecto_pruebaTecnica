<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ContenidosForm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contenidos Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contenidos-form-view">


    <p>
        <?= Html::a('Salir', ['estudiante', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'cursos.curso',
            'tema',
            'recursoUrl',
        ],
    ]) ?>

</div>
