<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\CutiPegawaiData;

/**
 * app\models\CutiPegawaiDataSearch represents the model behind the search form about `app\models\base\CutiPegawaiData`.
 */
 class CutiPegawaiDataSearch extends CutiPegawaiData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuti_id', 'jeniscuti_id', 'jml_hari'], 'integer'],
            [['pegawai_id', 'keterangan_cuti', 'domisili_cuti', 'nohp', 'tgl_pengajuancuti', 'tgl_awal', 'tgl_tidak_cuti', 'tgl_akhir', 'tgl_setujuicuti', 'statuspengajuan_id', 'pegawai_acc', 'file_datadukung'], 'safe'],
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
        $query = CutiPegawaiData::find();

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
            'cuti_id' => $this->cuti_id,
            'jeniscuti_id' => $this->jeniscuti_id,
            'tgl_pengajuancuti' => $this->tgl_pengajuancuti,
            'tgl_awal' => $this->tgl_awal,
            'tgl_akhir' => $this->tgl_akhir,
            'tgl_setujuicuti' => $this->tgl_setujuicuti,
            'jml_hari' => $this->jml_hari,
        ]);

        $query->andFilterWhere(['like', 'pegawai_id', $this->pegawai_id])
            ->andFilterWhere(['like', 'keterangan_cuti', $this->keterangan_cuti])
            ->andFilterWhere(['like', 'domisili_cuti', $this->domisili_cuti])
            ->andFilterWhere(['like', 'nohp', $this->nohp])
            ->andFilterWhere(['like', 'tgl_tidak_cuti', $this->tgl_tidak_cuti])
            ->andFilterWhere(['like', 'statuspengajuan_id', $this->statuspengajuan_id])
            ->andFilterWhere(['like', 'pegawai_acc', $this->pegawai_acc])
            ->andFilterWhere(['like', 'file_datadukung', $this->file_datadukung]);

        return $dataProvider;
    }
}
