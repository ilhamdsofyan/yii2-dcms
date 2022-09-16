<?php
namespace docotel\dcms\models\form;

use Yii;
use docotel\dcms\models\User;
use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequest extends Model
{
    public $email;
    public $reCaptcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => 'docotel\dcms\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
            [['reCaptcha'], \docotel\dcms\widget\recaptcha\ReCaptchaValidator::className(), 'secret' => Yii::$app->reCaptcha->secret, 'on' => 'reCaptchaOn'],


        ];
    }
}
