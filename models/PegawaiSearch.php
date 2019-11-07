<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pegawai;

/**
 * PegawaiSearch represents the model behind the search form of `app\models\Pegawai`.
 */
class PegawaiSearch extends Pegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_PEGAWAI', 'NAMA_PEGAWAI', 'TANGGAL_LAHIR', 'ALAMAT', 'NO_TELP'], 'safe'],
            [['ID_DEPARTEMEN', 'ID_POINT', 'TAHUN_MASUK'], 'integer'],
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
        $query = Pegawai::find();

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
            'ID_DEPARTEMEN' => $this->ID_DEPARTEMEN,
            'ID_POINT' => $this->ID_POINT,
            'TANGGAL_LAHIR' => $this->TANGGAL_LAHIR,
            'TAHUN_MASUK' => $this->TAHUN_MASUK,
        ]);

        $query->andFilterWhere(['like', 'ID_PEGAWAI', $this->ID_PEGAWAI])
            ->andFilterWhere(['like', 'NAMA_PEGAWAI', $this->NAMA_PEGAWAI])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'NO_TELP', $this->NO_TELP]);

        return $dataProvider;
    }
}
