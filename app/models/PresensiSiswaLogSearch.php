<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\PresensiSiswaLog;

/**
 * app\models\PresensiSiswaLogSearch represents the model behind the search form about `app\models\base\PresensiSiswaLog`.
 */
class PresensiSiswaLogSearch extends PresensiSiswaLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['logpresensi_id', 'kodeta'], 'integer'],
            [['waktu', 'nis', 'nokartu', 'latitude', 'longitude', 'jarakpresensi', 'kodekelas'], 'safe'],
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
        $query = PresensiSiswaLog::find();

        $query->orderBy(['waktu' => SORT_DESC]);

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

        $query->andFilterWhere(['like', 'nis', $this->nis])
            ->andFilterWhere(['like', 'nokartu', $this->nokartu])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'jarakpresensi', $this->jarakpresensi])
            ->andFilterWhere(['like', 'kodekelas', $this->kodekelas]);

        return $dataProvider;
    }
}
