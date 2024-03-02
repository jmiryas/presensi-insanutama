<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\Pendidikanpegawai;

/**
 * app\models\PendidikanpegawaiSearch represents the model behind the search form about `app\models\base\Pendidikanpegawai`.
 */
 class PendidikanpegawaiSearch extends Pendidikanpegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pendidikanpegawai_id'], 'integer'],
            [['pegawai_id', 'ket_pendidikan', 'jenjang', 'is_aktif'], 'safe'],
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
        $query = Pendidikanpegawai::find();

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
            'pendidikanpegawai_id' => $this->pendidikanpegawai_id,
        ]);

        $query->andFilterWhere(['like', 'pegawai_id', $this->pegawai_id])
            ->andFilterWhere(['like', 'ket_pendidikan', $this->ket_pendidikan])
            ->andFilterWhere(['like', 'jenjang', $this->jenjang])
            ->andFilterWhere(['like', 'is_aktif', $this->is_aktif]);

        return $dataProvider;
    }
}
