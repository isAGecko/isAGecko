<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departemen;

/**
 * DepartemenSearch represents the model behind the search form of `app\models\Departemen`.
 */
class DepartemenSearch extends Departemen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_DEPARTEMEN'], 'integer'],
            [['ID_PEGAWAI', 'NAMA_DEPARTEMEN'], 'safe'],
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
        $query = Departemen::find();

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
        ]);

        $query->andFilterWhere(['like', 'ID_PEGAWAI', $this->ID_PEGAWAI])
            ->andFilterWhere(['like', 'NAMA_DEPARTEMEN', $this->NAMA_DEPARTEMEN]);

        return $dataProvider;
    }
}
