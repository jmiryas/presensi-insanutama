<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\PresensiPegawaiData;

/**
 * app\models\PresensiPegawaiDataSearch represents the model behind the search form about `app\models\base\PresensiPegawaiData`.
 */
 class PresensiPegawaiDataSearch extends PresensiPegawaiData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['presensi_id', 'cuti_id', 'izin_id', 'logmasuk_id', 'logpulang_id', 'kodeta'], 'integer'],
            [['jadwalpresensi_id', 'pegawai_id', 'tgl', 'hari', 'status_berangkat', 'status_pulang', 'jam_masuk', 'jam_pulang', 'nokartu', 'latitude', 'longitude', 'keterangan', 'kodekelas', 'generate_id', 'created_at', 'updated_at'], 'safe'],
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
        $query = PresensiPegawaiData::find();

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
            'cuti_id' => $this->cuti_id,
            'izin_id' => $this->izin_id,
            'jam_masuk' => $this->jam_masuk,
            'jam_pulang' => $this->jam_pulang,
            'logmasuk_id' => $this->logmasuk_id,
            'logpulang_id' => $this->logpulang_id,
            'kodeta' => $this->kodeta,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'jadwalpresensi_id', $this->jadwalpresensi_id])
            ->andFilterWhere(['like', 'pegawai_id', $this->pegawai_id])
            ->andFilterWhere(['like', 'hari', $this->hari])
            ->andFilterWhere(['like', 'status_berangkat', $this->status_berangkat])
            ->andFilterWhere(['like', 'status_pulang', $this->status_pulang])
            ->andFilterWhere(['like', 'nokartu', $this->nokartu])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'kodekelas', $this->kodekelas])
            ->andFilterWhere(['like', 'generate_id', $this->generate_id]);

        return $dataProvider;
    }
}
