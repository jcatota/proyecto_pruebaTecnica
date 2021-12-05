<?php

use app\models\ContenidosForm;
use app\models\UsuariosCursosForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\NotasForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notas-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuarios_cursos_cursos_id')->dropDownList(ArrayHelper::map(UsuariosCursosForm::find()->all(), 'cursos_id', 'CursoData')) ?>

    <?= $form->field($model, 'contenidos_id')->dropDownList(ArrayHelper::map(ContenidosForm::find()->all(), 'id', 'tema')) ?>

    <?= $form->field($model, 'usuarios_cursos_usuarios_id')->dropDownList(ArrayHelper::map(UsuariosCursosForm::find()->all(), 'usuarios_id', 'UsuarioData')) ?>

    

    <?= $form->field($model, 'nota')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>