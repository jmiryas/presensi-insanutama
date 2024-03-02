<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\PresensiPegawaiJenispresensi;

/**
 * app\models\PresensiPegawaiJenispresensiSearch represents the model behind the search form about `app\models\base\PresensiPegawaiJenispresensi`.
 */
 class PresensiPegawaiJenispresensiSearch extends PresensiPegawaiJenispresensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenispresensi'], 'safe'],
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
        $query = PresensiPegawaiJenispresensi::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'jenispresensi', $this->jenispresensi]);

        return $dataProvider;
    }
}
