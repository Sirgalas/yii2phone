<?php

namespace app\modules\phone\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\phone\models\UserTel;

/**
 * UserTelSearch represents the model behind the search form about `app\modules\phone\models\UserTel`.
 */
class UserTelSearch extends UserTel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country', 'tel'], 'integer'],
            [['nameLastName'], 'safe'],
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

        if (array_key_exists('sort',$params)){
            $query = UserTel::find();
        }else{
            $query = UserTel::find()->orderBy(['nameLastName'=>SORT_ASC]);

        }
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
            'country' => $this->country,
            'tel' => $this->tel,
        ]);

        $query->andFilterWhere(['like', 'nameLastName', $this->nameLastName]);

        return $dataProvider;
    }
}
