<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NotasForm;

/**
 * notaSearch represents the model behind the search form of `app\models\NotasForm`.
 */
class notaSearch extends NotasForm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nota'], 'number'],
            [['contenidos_id', 'usuarios_cursos_usuarios_id', 'usuarios_cursos_cursos_id'], 'integer'],
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
        $query = NotasForm::find()
        ->joinWith('contenidos')
        ->joinWith('usuariosCursosUsuarios')
        ;

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
            'nota' => $this->nota,
            'contenidos_id' => $this->contenidos_id,
            'usuarios_cursos_usuarios_id' => $this->usuarios_cursos_usuarios_id,
            'usuarios_cursos_cursos_id' => $this->usuarios_cursos_cursos_id,
        ]);

        return $dataProvider;
    }
}
