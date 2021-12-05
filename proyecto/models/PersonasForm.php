<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property int $id
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Identificacion
 *
 * @property Usuarios[] $usuarios
 */
class PersonasForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Apellido', 'Identificacion'], 'required'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['Identificacion'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Identificacion' => 'Identificacion',
        ];
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(UsuariosForm::className(), ['personas_id' => 'id']);
    }


    /**
     * Get full name from persona
     */
    public function getFullName()
    {
        return $this->Nombre . ' ' . $this->Apellido;
    }

    /**
     * Get  data from persona
     */
    public function getPersonaData()
    {
        return $this->Identificacion. ' - ' .$this->Nombre . ' ' . $this->Apellido;
    }
}
