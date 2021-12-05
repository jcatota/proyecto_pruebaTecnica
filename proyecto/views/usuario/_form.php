<?php

use app\models\ContenidosForm;
use app\models\PersonasForm;
use app\models\RolesForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'personas_id')->dropDownList(ArrayHelper::map(PersonasForm::find()->all(),'id','FullName')) ?>

    <?= $form->field($model, 'roles_id')->dropDownList(ArrayHelper::map(RolesForm::find()->all(),'id','rol')) ?>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'token')->hiddenInput(['value'=>''])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
