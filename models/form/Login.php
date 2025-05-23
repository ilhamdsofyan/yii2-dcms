<?php

namespace docotel\dcms\models\form;

use Yii;
use yii\base\Model;
use docotel\dcms\models\User;

/**
 * Login form
 */
class Login extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $reCaptcha;

    private $loginProvider;
    private $_user = false;

    public function __construct()
    {
        Yii::$container->setSingleton('docotel\dcms\components\dal\ILoginProvider',
            'docotel\dcms\components\dal\UserProvider');
        $this->loginProvider = Yii::$container->get('docotel\dcms\components\dal\ILoginProvider');
        parent::__construct();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            [['reCaptcha'], \docotel\dcms\widget\recaptcha\ReCaptchaValidator::className(), 'secret' => Yii::$app->reCaptcha->secret, 'on' => 'failthreetimes'],

        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = $this->loginProvider->findByUsername($this->username);
        }

        return $this->_user;
    }
}
