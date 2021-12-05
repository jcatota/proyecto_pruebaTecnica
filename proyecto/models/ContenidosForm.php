<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contenidos".
 *
 * @property int $id
 * @property string $tema
 * @property string $recursoUrl
 * @property int $cursos_id
 *
 * @property Cursos $cursos
 * @property Notas[] $notas
 */
class ContenidosForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contenidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tema', 'recursoUrl', 'cursos_id'], 'required'],
            [['cursos_id'], 'integer'],
            [['tema'], 'string', 'max' => 100],
            [['recursoUrl'], 'string', 'max' => 200],
            [['cursos_id'], 'exist', 'skipOnError' => true, 'targetClass' => CursosForm::className(), 'targetAttribute' => ['cursos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tema' => 'Tema',
            'recursoUrl' => 'Recurso Url',
            'cursos_id' => 'Curso',
        ];
    }

    /**
     * Gets query for [[Cursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasOne(CursosForm::className(), ['id' => 'cursos_id']);
    }


    /**
     * Gets query for [[Notas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(NotasForm::className(), ['contenidos_id' => 'id']);
    }

    /**
     * 
     * 
     */
    public function getCursoContenido()
    {

        return CursosForm::findOne($this->cursos_id)->curso . ' - ' . $this->tema;
        
    }
}
