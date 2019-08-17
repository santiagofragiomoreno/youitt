<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Productin;

/**
 * ProductinSearch represents the model behind the search form of `common\models\Productin`.
 */
class ProductinSearch extends Productin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pantry_clients_id', 'client_id'], 'integer'],
            [['productos_codigo', 'created_at'], 'safe'],
            [['productos_peso_producto'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Productin::find();

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
            'pantry_clients_id' => $this->pantry_clients_id,
            'client_id' => $this->client_id,
            'productos_peso_producto' => $this->productos_peso_producto,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'productos_codigo', $this->productos_codigo]);

        return $dataProvider;
    }
}
