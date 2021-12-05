<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notas".
 *
 * @property float|null $nota
 * @property int $contenidos_id
 * @property int $usuarios_cursos_usuarios_id
 * @property int $usuarios_cursos_cursos_id
 *
 * @property Contenidos $contenidos
 * @property UsuariosCursos $usuariosCursosUsuarios
 */
class NotasForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nota'], 'number'],
            [['contenidos_id', 'usuarios_cursos_usuarios_id', 'usuarios_cursos_cursos_id'], 'required'],
            [['contenidos_id', 'usuarios_cursos_usuarios_id', 'usuarios_cursos_cursos_id'], 'integer'],
            [['contenidos_id', 'usuarios_cursos_usuarios_id', 'usuarios_cursos_cursos_id'], 'unique', 'targetAttribute' => ['contenidos_id', 'usuarios_cursos_usuarios_id', 'usuarios_cursos_cursos_id']],
            [['contenidos_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContenidosForm::className(), 'targetAttribute' => ['contenidos_id' => 'id']],
            [['usuarios_cursos_usuarios_id', 'usuarios_cursos_cursos_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsuariosCursosForm::className(), 'targetAttribute' => ['usuarios_cursos_usuarios_id' => 'usuarios_id', 'usuarios_cursos_cursos_id' => 'cursos_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nota' => 'Nota',
            'contenidos_id' => 'Tema',
            'usuarios_cursos_usuarios_id' => 'Usuario',
            'usuarios_cursos_cursos_id' => 'Curso',
        ];
    }

    /**
     * Gets query for [[Contenidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContenidos()
    {
        return $this->hasOne(ContenidosForm::className(), ['id' => 'contenidos_id']);
    }

    /**
     * Gets query for [[UsuariosCursosUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosCursosUsuarios()
    {
        return $this->hasOne(UsuariosCursosForm::className(), ['usuarios_id' => 'usuarios_cursos_usuarios_id', 'cursos_id' => 'usuarios_cursos_cursos_id'])
        ->joinWith('usuarios');
    }
}
