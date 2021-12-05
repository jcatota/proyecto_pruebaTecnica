<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContenidosForm */

$this->title = 'Crear Contenidos';
$this->params['breadcrumbs'][] = ['label' => 'Contenidos Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contenidos-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
