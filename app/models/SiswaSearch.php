<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\Siswa;

/**
 * app\models\SiswaSearch represents the model behind the search form about `app\models\base\Siswa`.
 */
 class SiswaSearch extends Siswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nis', 'kodejeniskeringanan', 'nama', 'panggilan', 'tempatlahir', 'tgllahir', 'tahunmasuk', 'namabapak', 'namaibu', 'alamat', 'notelpon', 'namaori', 'templatefinger', 'nokartu', 'kelas_id', 'longit', 'latit', 'adress', 'pin', 'kamar_id', 'profil', 'kamar', 'asrama', 'lokasi_asrama', 'kodeAsrama', 'status_ketua_kamar', 'tgl_mapping', 'foto', 'nisn'], 'safe'],
            [['idasalsekolah', 'kodejk'], 'integer'],
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
        $query = Siswa::find();

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
            'idasalsekolah' => $this->idasalsekolah,
            'kodejk' => $this->kodejk,
            'tgllahir' => $this->tgllahir,
            'tgl_mapping' => $this->tgl_mapping,
        ]);

        $query->andFilterWhere(['like', 'nis', $this->nis])
            ->andFilterWhere(['like', 'kodejeniskeringanan', $this->kodejeniskeringanan])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'panggilan', $this->panggilan])
            ->andFilterWhere(['like', 'tempatlahir', $this->tempatlahir])
            ->andFilterWhere(['like', 'tahunmasuk', $this->tahunmasuk])
            ->andFilterWhere(['like', 'namabapak', $this->namabapak])
            ->andFilterWhere(['like', 'namaibu', $this->namaibu])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'notelpon', $this->notelpon])
            ->andFilterWhere(['like', 'namaori', $this->namaori])
            ->andFilterWhere(['like', 'templatefinger', $this->templatefinger])
            ->andFilterWhere(['like', 'nokartu', $this->nokartu])
            ->andFilterWhere(['like', 'kelas_id', $this->kelas_id])
            ->andFilterWhere(['like', 'longit', $this->longit])
            ->andFilterWhere(['like', 'latit', $this->latit])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'pin', $this->pin])
            ->andFilterWhere(['like', 'kamar_id', $this->kamar_id])
            ->andFilterWhere(['like', 'profil', $this->profil])
            ->andFilterWhere(['like', 'kamar', $this->kamar])
            ->andFilterWhere(['like', 'asrama', $this->asrama])
            ->andFilterWhere(['like', 'lokasi_asrama', $this->lokasi_asrama])
            ->andFilterWhere(['like', 'kodeAsrama', $this->kodeAsrama])
            ->andFilterWhere(['like', 'status_ketua_kamar', $this->status_ketua_kamar])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'nisn', $this->nisn]);

        return $dataProvider;
    }
}
