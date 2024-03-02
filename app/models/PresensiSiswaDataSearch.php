<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\PresensiSiswaData;

/**
 * app\models\PresensiSiswaDataSearch represents the model behind the search form about `app\models\base\PresensiSiswaData`.
 */
 class PresensiSiswaDataSearch extends PresensiSiswaData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['presensi_id', 'logmasuk_id', 'logpulang_id', 'kodeta'], 'integer'],
            [['jadwalpresensi_id', 'nis', 'tgl', 'hari', 'status_kehadiran', 'jam_masuk', 'jam_pulang', 'nokartu', 'latitude', 'longitude', 'keterangan', 'kodekelas', 'generate_id', 'created_at', 'updated_at'], 'safe'],
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
        $query = PresensiSiswaData::find();

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
            'presensi_id' => $this->presensi_id,
            'tgl' => $this->tgl,
            'jam_masuk' => $this->jam_masuk,
            'jam_pulang' => $this->jam_pulang,
            'logmasuk_id' => $this->logmasuk_id,
            'logpulang_id' => $this->logpulang_id,
            'kodeta' => $this->kodeta,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'jadwalpresensi_id', $this->jadwalpresensi_id])
            ->andFilterWhere(['like', 'nis', $this->nis])
            ->andFilterWhere(['like', 'hari', $this->hari])
            ->andFilterWhere(['like', 'status_kehadiran', $this->status_kehadiran])
            ->andFilterWhere(['like', 'nokartu', $this->nokartu])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'kodekelas', $this->kodekelas])
            ->andFilterWhere(['like', 'generate_id', $this->generate_id]);

        return $dataProvider;
    }
}
