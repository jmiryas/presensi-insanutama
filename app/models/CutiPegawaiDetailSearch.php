<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\CutiPegawaiDetail;

/**
 * app\models\CutiPegawaiDetailSearch represents the model behind the search form about `app\models\base\CutiPegawaiDetail`.
 */
 class CutiPegawaiDetailSearch extends CutiPegawaiDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cutidetail_id', 'cuti_id'], 'integer'],
            [['tgl_cuti'], 'safe'],
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
        $query = CutiPegawaiDetail::find();

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
            'cutidetail_id' => $this->cutidetail_id,
            'cuti_id' => $this->cuti_id,
            'tgl_cuti' => $this->tgl_cuti,
        ]);

        return $dataProvider;
    }
}
