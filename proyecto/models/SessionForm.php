<?php
namespace app\models;

use yii\base\Model;

class SessionForm extends Model
{
    public $status;
    public $token;
    public $rol;

    public function attributeLabels()
    {
        return [
            'status' => $this->status,
            'token' => $this->token,
            'rol' => $this->rol,
        ];
    }

    public function setValues($status,$token,$rol){
        $this->status=$status;
        $this->token=$token;
        $this->rol=$rol;
    }
}
