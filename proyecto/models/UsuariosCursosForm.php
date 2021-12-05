<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_cursos".
 *
 * @property int $cursos_id
 * @property int $usuarios_id
 *
 * @property Cursos $cursos
 * @property Notas[] $notas
 * @property Usuarios $usuarios
 */
class UsuariosCursosForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios_cursos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cursos_id', 'usuarios_id'], 'required'],
            [['cursos_id', 'usuarios_id'], 'integer'],
            [['cursos_id', 'usuarios_id'], 'unique', 'targetAttribute' => ['cursos_id', 'usuarios_id']],
            [['cursos_id'], 'exist', 'skipOnError' => true, 'targetClass' => CursosForm::className(), 'targetAttribute' => ['cursos_id' => 'id']],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsuariosForm::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cursos_id' => 'Curso',
            'usuarios_id' => 'Usuario',
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
        return $this->hasMany(NotasForm::className(), ['usuarios_cursos_usuarios_id' => 'usuarios_id', 'usuarios_cursos_cursos_id' => 'cursos_id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(UsuariosForm::className(), ['id' => 'usuarios_id']);
    }

    public function getUsuarioData2()
    {

        return $this->hasOne(UsuariosForm::className(), ['id' => 'usuarios_id'])->joinWith('personas');
        
    }

    public function getUsuarioData()
    {

        return UsuariosForm::findOne($this->usuarios_id)->getPersonaData();
        
    }

    public function getCursoData()
    {

        return CursosForm::findOne($this->cursos_id)->curso;
        
    }
}
