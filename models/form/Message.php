<?php

namespace docotel\dcms\models\form;

use Yii;
use yii\base\Model;

/**
 * This is the model class for form "message".
 *
 * @property string $destination_type
 * @property string $destination
 * @property string $subject
 * @property string $message
 */
class Message extends Model
{
    public $message_id;
    public $destination_type;
    public $destination;
    public $subject;
    public $message;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'message', 'destination'], 'required'],
            [['destination_type', 'message_id'], 'safe'],
            [['subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'message_id' => Yii::t('rbac-dcms', 'Message ID'),
            'destination_type' => Yii::t('rbac-dcms', 'Destination Type'),
            'destination' => Yii::t('rbac-dcms', 'Destination'),
            'subject' => Yii::t('rbac-dcms', 'Subject'),
            'message' => Yii::t('rbac-dcms', 'Message'),
        ];
    }
}
