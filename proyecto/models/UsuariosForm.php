<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $usuario
 * @property string $passw
 * @property string|null $token
 * @property int $roles_id
 * @property int|null $personas_id
 *
 * @property Notas[] $notas
 * @property Personas $personas
 * @property Roles $roles
 */
class UsuariosForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario', 'passw', 'roles_id'], 'required'],
            [['roles_id', 'personas_id'], 'integer'],
            [['usuario', 'passw'], 'string', 'max' => 25],
            [['usuario'], 'unique'],
            [['token'], 'string', 'max' => 100],
            [['personas_id'], 'exist', 'skipOnError' => true, 'targetClass' => PersonasForm::className(), 'targetAttribute' => ['personas_id' => 'id']],
            [['roles_id'], 'exist', 'skipOnError' => true, 'targetClass' => RolesForm::className(), 'targetAttribute' => ['roles_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'passw' => 'Contraseña',
            'token' => 'Token',
            'roles_id' => 'Rol',
            'personas_id' => 'Persona',
        ];
    }

    /**
     * Gets query for [[Notas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(NotasForm::className(), ['usuarios_id' => 'id']);
    }

    /**
     * Gets query for [[Personas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasOne(PersonasForm::className(), ['id' => 'personas_id']);
    }

    /**
     * Gets query for [[Roles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasOne(RolesForm::className(), ['id' => 'roles_id']);
    }

    public function getPersonaData()
    {

        return PersonasForm::findOne($this->personas_id)->getPersonaData();
        
    }

}
