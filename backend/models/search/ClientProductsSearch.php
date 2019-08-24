<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ClientProducts;

/**
 * ClientProductsSearch represents the model behind the search form of `common\models\ClientProducts`.
 */
class ClientProductsSearch extends ClientProducts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_id'], 'integer'],
            [['product_code', 'product_name'], 'safe'],
            [['product_quantity'], 'number'],
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
        $query = ClientProducts::find();

        // add conditions that should always apply here
        if(isset($params['ClientProductsSearch']['client_id'])  != null){
            $this->client_id = $params['ClientProductsSearch']['client_id'];
        }
        else if($params!=null){
            $this->client_id = $params['id'];
        }
        
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
            'client_id' => $this->client_id,
            'product_quantity' => $this->product_quantity,
        ]);

        $query->andFilterWhere(['like', 'product_code', $this->product_code])
            ->andFilterWhere(['like', 'product_name', $this->product_name]);

        return $dataProvider;
    }
}
