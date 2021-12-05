<?php

use app\models\CursosForm;
use phpDocumentor\Reflection\Types\Array_;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ContenidosForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contenidos-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cursos_id')->dropDownList(ArrayHelper::map(CursosForm::find()->all(),'id','curso')) ?>

    <?= $form->field($model, 'tema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recursoUrl')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>