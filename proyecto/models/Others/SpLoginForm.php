<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sp_login".
 *
 * @property string $estado
 * @property string $token
 *
 * 
 */
class SpLoginForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sp_login';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'estado' => 'Estado',
            'token' => 'Token',
            
        ];
    }

    /*
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     *
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['roles_id' => 'id']);
    }
    */

    
}
