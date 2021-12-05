<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuariosForm;
use Yii;

/**
 * usuarioSearch represents the model behind the search form of `app\models\UsuariosForm`.
 */
class usuarioSearch extends UsuariosForm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'roles_id', 'personas_id'], 'integer'],
            [['usuario', 'passw', 'token'], 'safe'],
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
        $query = UsuariosForm::find()->joinWith('roles')->joinWith('personas');

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
            'roles_id' => $this->roles_id,
            'personas_id' => $this->personas_id,
        ]);

        $query->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'passw', $this->passw])
            ->andFilterWhere(['like', 'token', $this->token]);

        return $dataProvider;
    }

    public function searchLogin($params)
    {
        $sf = new SessionForm();

        $this->load($params);

        $userModel = UsuariosForm::find()->joinWith('roles')
            ->where(['usuario' => $this->usuario])
            ->andWhere(['=', 'passw', $this->passw]);

        if ($userModel->exists()) {
            $key = Yii::$app->getSecurity()->generateRandomString();

            $data = $userModel->one();
            $data->updateAttributes(['token' => $key]);
            /*
            return [
                'token' => $data->token,
                'rol' => $data->roles->rol,
            ];*/


            $sf->setValues(true, $data->token, $data->roles->rol);

            return $sf;
        }

        $sf->setValues(false, '', '');

        return $sf;
    }
}
