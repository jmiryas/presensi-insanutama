<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\CutiPegawaiJeniscuti;

/**
 * app\models\CutiPegawaiJeniscutiSearch represents the model behind the search form about `app\models\base\CutiPegawaiJeniscuti`.
 */
 class CutiPegawaiJeniscutiSearch extends CutiPegawaiJeniscuti
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jeniscuti_id'], 'integer'],
            [['nama_jeniscuti'], 'safe'],
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
        $query = CutiPegawaiJeniscuti::find();

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
            'jeniscuti_id' => $this->jeniscuti_id,
        ]);

        $query->andFilterWhere(['like', 'nama_jeniscuti', $this->nama_jeniscuti]);

        return $dataProvider;
    }
}
