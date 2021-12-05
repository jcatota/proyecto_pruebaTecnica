<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContenidosForm;

/**
 * contenidoSearch represents the model behind the search form of `app\models\ContenidosForm`.
 */
class contenidoSearch extends ContenidosForm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cursos_id'], 'integer'],
            [['tema', 'recursoUrl'], 'safe'],
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
        $query = ContenidosForm::find()->joinWith('cursos');

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
            'cursos_id' => $this->cursos_id,
        ]);

        $query->andFilterWhere(['like', 'tema', $this->tema])
            ->andFilterWhere(['like', 'recursoUrl', $this->recursoUrl]);

        return $dataProvider;
    }
}
