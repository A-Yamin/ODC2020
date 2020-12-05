<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Parties */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parties-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php endif ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
