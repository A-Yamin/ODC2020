<?php

use borales\extensions\phoneInput\PhoneInput;
use common\models\Parties;
use kartik\date\DatePicker;
use sultonov\cropper\CropperWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <?= $form->field($model, 'phone')->widget(PhoneInput::className(), [
        'options' => [
            'class' => "form-group form-control"
        ],
        'jsOptions' => [
            'preferredCountries' => ['no', 'pl', 'ua'],
        ]
    ]); ?>

    <?= $form->field($model, 'part_id')->dropDownList(ArrayHelper::map(Parties::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(\common\models\Regions::find()->all(),'id','name')) ?>

    <?=$form->field($model, 'photo')->widget(CropperWidget::className(), [
        'uploadUrl' => \yii\helpers\Url::toRoute('user/photo'),
        'prefixUrl' => 'uploads/userPhoto/',
        'avatar' => true,
        'width' => 480,
        'height' => 480
    ]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'verification_token')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
