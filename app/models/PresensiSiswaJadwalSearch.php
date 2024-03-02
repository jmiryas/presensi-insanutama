<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\PresensiSiswaJadwal;

/**
 * app\models\PresensiSiswaJadwalSearch represents the model behind the search form about `app\models\base\PresensiSiswaJadwal`.
 */
 class PresensiSiswaJadwalSearch extends PresensiSiswaJadwal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jadwalpresensi_id', 'jenispresensi', 'kode_hari', 'jadwal_masuk', 'jadwal_pulang', 'batas_awal_masuk', 'batas_akhir_masuk', 'batas_awal_pulang', 'batas_akhir_pulang', 'isaktif', 'created_at', 'updated_at'], 'safe'],
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
        $query = PresensiSiswaJadwal::find();

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
            'jadwal_masuk' => $this->jadwal_masuk,
            'jadwal_pulang' => $this->jadwal_pulang,
            'batas_awal_masuk' => $this->batas_awal_masuk,
            'batas_akhir_masuk' => $this->batas_akhir_masuk,
            'batas_awal_pulang' => $this->batas_awal_pulang,
            'batas_akhir_pulang' => $this->batas_akhir_pulang,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'jadwalpresensi_id', $this->jadwalpresensi_id])
            ->andFilterWhere(['like', 'jenispresensi', $this->jenispresensi])
            ->andFilterWhere(['like', 'kode_hari', $this->kode_hari])
            ->andFilterWhere(['like', 'isaktif', $this->isaktif]);

        return $dataProvider;
    }
}
