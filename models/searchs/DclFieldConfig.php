<?php

namespace docotel\dcms\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use docotel\dcms\models\DclFieldConfig as DclFieldConfigModel;

/**
 * DclFieldConfig represents the model behind the search form about `docotel\dcms\models\DclFieldConfig`.
 */
class DclFieldConfig extends DclFieldConfigModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'required', 'active', 'timestamp'], 'integer'],
            [['node_type', 'field_name', 'type', 'message', 'data'], 'safe'],
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
        $query = DclFieldConfigModel::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'required' => $this->required,
            'active' => $this->active,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'node_type', $this->node_type])
            ->andFilterWhere(['like', 'field_name', $this->field_name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
