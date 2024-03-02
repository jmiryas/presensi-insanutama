<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\IzinPegawaiData;

/**
 * app\models\IzinPegawaiDataSearch represents the model behind the search form about `app\models\base\IzinPegawaiData`.
 */
class IzinPegawaiDataSearch extends IzinPegawaiData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_id', 'jenisizin_id', 'jml_hari'], 'integer'],
            [['pegawai_id', 'keterangan_izin', 'tgl_pengajuanizin', 'tgl_awal', 'tgl_izin', 'tgl_akhir', 'tgl_setujuiizin', 'pegawai_acc', 'bukti', 'statuspengajuan_id', 'created_at', 'updated_at'], 'safe'],
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
        $query = IzinPegawaiData::find();

        if (!Yii::$app->user->identity->superadmin) {
            $query = IzinPegawaiData::find()
                ->where(['pegawai_id' => Yii::$app->user->identity->username]);
        }

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
            'izin_id' => $this->izin_id,
            'jenisizin_id' => $this->jenisizin_id,
            'tgl_pengajuanizin' => $this->tgl_pengajuanizin,
            'tgl_awal' => $this->tgl_awal,
            'tgl_akhir' => $this->tgl_akhir,
            'tgl_setujuiizin' => $this->tgl_setujuiizin,
            'jml_hari' => $this->jml_hari,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'pegawai_id', $this->pegawai_id])
            ->andFilterWhere(['like', 'keterangan_izin', $this->keterangan_izin])
            ->andFilterWhere(['like', 'tgl_izin', $this->tgl_izin])
            ->andFilterWhere(['like', 'pegawai_acc', $this->pegawai_acc])
            ->andFilterWhere(['like', 'bukti', $this->bukti])
            ->andFilterWhere(['like', 'statuspengajuan_id', $this->statuspengajuan_id]);

        return $dataProvider;
    }
}
