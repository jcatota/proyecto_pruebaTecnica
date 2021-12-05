<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CursosForm */

$this->title = 'Crear Cursos';
$this->params['breadcrumbs'][] = ['label' => 'Cursos Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
