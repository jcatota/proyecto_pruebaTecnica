<?php

use app\models\CursosForm;
use app\models\UsuariosForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosCursosForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-cursos-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuarios_id')->dropDownList(ArrayHelper::map(UsuariosForm::find()->all(),'id','PersonaData')) ?>

    <?= $form->field($model, 'cursos_id')->dropDownList(ArrayHelper::map(CursosForm::find()->all(),'id','curso')) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
