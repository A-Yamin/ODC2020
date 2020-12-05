<?php

use borales\extensions\phoneInput\PhoneInput;
use common\models\Parties;
use common\models\Regions;
use common\models\User;
use kartik\date\DatePicker;
use sultonov\cropper\CropperWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php endif ?>
    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'secount_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->dropDownList(['male' => "Male", 'female' => "Female"]) ?>

    <?= $form->field($model, 'jshsh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]); ?>

    <?= $form->field($model, 'seriesParport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
        'mask' => '+998-99-999-99-99',
    ]) ?>

    <?= $form->field($model, 'part_id')->dropDownList(ArrayHelper::map(Parties::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(Regions::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'file')->fileInput(['multiple' => false, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'status')->dropDownList([User::STATUS_ACTIVE => 'active', User::STATUS_INACTIVE => 'inactive', User::STATUS_DELETED => 'deleted']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
