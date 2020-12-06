<?php
namespace frontend\controllers;

use common\models\Feedbacks;
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
class FeedbacksController extends Controller
{

    public function actionAdd($deputat_id = null){

        $model = new Feedbacks();
        if ($model->load(Yii::$app->request->post())){
            $model->created_at = time();
            $model->updated_at = time();
            $model->save();
            Yii::$app->session->setFlash('success','Sizning murojaatingiz qo`shildi');
            return $this->render('feedback',[
                'deputat_id' => $deputat_id,
                'model' => $model

            ]);
        }
         return $this->render('feedback',[
             'deputat_id' => $deputat_id,
             'model' => $model
         ]);
    }


}
