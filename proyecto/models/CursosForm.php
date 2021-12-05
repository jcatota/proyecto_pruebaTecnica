<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursos".
 *
 * @property int $id
 * @property string $curso
 *
 * @property Contenidos[] $contenidos
 */
class CursosForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['curso'], 'required'],
            [['curso'], 'string', 'max' => 100],
            [['curso'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'curso' => 'Curso',
        ];
    }

    /**
     * Gets query for [[Contenidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContenidos()
    {
        return $this->hasMany(ContenidosForm::className(), ['cursos_id' => 'id']);
    }

    
}
