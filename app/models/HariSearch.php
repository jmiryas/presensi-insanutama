<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\Hari;

/**
 * app\models\HariSearch represents the model behind the search form about `app\models\base\Hari`.
 */
class HariSearch extends Hari
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kodehari', 'namahari'], 'safe'],
            [['nourut', 'hari_id'], 'integer'],
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
        $query = Hari::find();

        $query->orderBy(['nourut' =>  SORT_ASC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'nourut' => $this->nourut,
            'hari_id' => $this->hari_id,
        ]);

        $query->andFilterWhere(['like', 'kodehari', $this->kodehari])
            ->andFilterWhere(['like', 'namahari', $this->namahari]);

        return $dataProvider;
    }
}
