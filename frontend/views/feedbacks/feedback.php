<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="light-wrapper">
    <div class="container inner">
        <h1 class="text-center">Murojaat qoldirish</h1>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-container">
                    <?php
                    $form = ActiveForm::begin(); ?>
                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                    <?php endif ?>
                    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Categories::find()->all(), 'id', 'name')) ?>

                    <?php if (!isset($deputat_id)) { ?>
                        <?= $form->field($model, 'user_id')->dropDownList(['male' => "Male", 'female' => "Female"]) ?>
                    <?php } else { ?>
                        <input type="hidden" name="user_id" value="<?= $deputat_id ?>">
                    <?php } ?>

                    <?= $form->field($model, 'content')->textarea() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>


                </div>
            </div>
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</div>
