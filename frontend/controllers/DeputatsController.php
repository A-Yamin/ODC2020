<?php
namespace frontend\controllers;

use common\models\User;
use common\models\UserSearch;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class DeputatsController extends Controller
{

    public function actionList(){
       $model = User::find()->where(['isDeputat' => true])->all();
        return $this->render('deputats', [
            'model' => $model
        ]);
    }

}
