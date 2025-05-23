<?php

namespace docotel\dcms\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use docotel\dcms\models\Message;
use docotel\dcms\models\MessageBox as MessageBoxModel;

/**
 * Message represents the model behind the search form about `docotel\dcms\models\Message`.
 */
class MessageBox extends Model
{
    public $message_box_id;
    public $message_id;
    public $type;
    public $receiver;
    public $date;

        /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id'], 'integer'],
            [['type', 'receiver', 'date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MessageBoxModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }
}
