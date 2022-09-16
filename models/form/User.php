<?php

namespace docotel\dcms\models\form;

use Yii;
use yii\base\Model;

class User extends Model
{
    public $username;
    public $email;
    public $group_id = [];
    public $newPassword;
    public $retypePassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            ['email', 'email'],
            [['newPassword', 'retypePassword'], 'safe'],
            [['newPassword'], 'string', 'min' => 6],
            [['retypePassword'], 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'User Name',
            'group_id' => 'Group ID',
        ];
    }
}
