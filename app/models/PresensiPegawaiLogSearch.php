<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\PresensiPegawaiLog;

/**
 * app\models\PresensiPegawaiLogSearch represents the model behind the search form about `app\models\base\PresensiPegawaiLog`.
 */
 class PresensiPegawaiLogSearch extends PresensiPegawaiLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['logpresensi_id', 'kodeta'], 'integer'],
            [['waktu', 'pegawai_id', 'nokartu', 'latitude', 'longitude', 'jarakpresensi', 'kodekelas', 'jenispresensi'], 'safe'],
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
        $query = PresensiPegawaiLog::find();

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
            'logpresensi_id' => $this->logpresensi_id,
            'waktu' => $this->waktu,
            'kodeta' => $this->kodeta,
        ]);

        $query->andFilterWhere(['like', 'pegawai_id', $this->pegawai_id])
            ->andFilterWhere(['like', 'nokartu', $this->nokartu])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'jarakpresensi', $this->jarakpresensi])
            ->andFilterWhere(['like', 'kodekelas', $this->kodekelas])
            ->andFilterWhere(['like', 'jenispresensi', $this->jenispresensi]);

        return $dataProvider;
    }
}
