<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SpLoginForm;

/**
 * rolSearch represents the model behind the search form of `app\models\RolesForm`.
 */
class sploginSearch extends SpLoginForm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['string'], 'safe'],
            [['string'], 'safe'],
        ];
    }


    public function getLogin()
    {
        
        $result = \Yii::$app->db->createCommand("CALL sp_login(:usuarioIn, :passwIn)")
             ->bindValue(':usuarioIn', 'josue')
            ->bindValue(':passwIn', 'josue')
            ->query();

/*
        $result = \Yii::$app->db->createCommand("CALL coverage_dis_prof(@r,:prof, :dis);")
            ->bindValue(':prof', 2)
            ->bindValue(':dis', 31)->execute();
        $rez = \Yii::$app->db->createCommand("SELECT @r;")->queryScalar();
        $r = (float)$rez;
        */

        return $result;
    }
}
