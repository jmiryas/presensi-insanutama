<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\Jenispegawai;

/**
 * app\models\JenispegawaiSearch represents the model behind the search form about `app\models\base\Jenispegawai`.
 */
 class JenispegawaiSearch extends Jenispegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenispegawai_id', 'nama_jenispegawai'], 'safe'],
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
        $query = Jenispegawai::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'jenispegawai_id', $this->jenispegawai_id])
            ->andFilterWhere(['like', 'nama_jenispegawai', $this->nama_jenispegawai]);

        return $dataProvider;
    }
}
