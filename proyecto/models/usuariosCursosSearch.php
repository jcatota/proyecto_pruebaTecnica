<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuariosCursosForm;

/**
 * usuariosCursosSearch represents the model behind the search form of `app\models\UsuariosCursosForm`.
 */
class usuariosCursosSearch extends UsuariosCursosForm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cursos_id', 'usuarios_id'], 'integer'],
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
        $query = UsuariosCursosForm::find()->joinWith('cursos')->joinWith('usuarioData2');

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
            'cursos_id' => $this->cursos_id,
            'usuarios_id' => $this->usuarios_id,
        ]);

        return $dataProvider;
    }
}
