<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zakat;

/**
 * ZakatSearch represents the model behind the search form of `app\models\Zakat`.
 */
class ZakatSearch extends Zakat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_muzaki', 'id_jenis_zakat'], 'integer'],
            [['tanggal', 'status', 'bukti_pembayaran'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Zakat::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tanggal' => $this->tanggal,
            'id_muzaki' => $this->id_muzaki,
            'id_jenis_zakat' => $this->id_jenis_zakat,
            'nominal' => $this->nominal,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'bukti_pembayaran', $this->bukti_pembayaran]);

        return $dataProvider;
    }
}
