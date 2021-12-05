<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\notaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notas-form-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nota') ?>

    <?= $form->field($model, 'contenidos_id') ?>

    <?= $form->field($model, 'usuarios_cursos_usuarios_id') ?>

    <?= $form->field($model, 'usuarios_cursos_cursos_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
