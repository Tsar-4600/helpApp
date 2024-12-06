<?php

namespace app\models;

use Yii;
use yii\base\Model;
class RegForm extends Model
{
    public  $login,
            $password,
            $passwordConfirm,
            $id_role = 2,
            $SNP,
            $email,
            $telephone,
            $agree;

            
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // login and password are both required
            [['login', 'password', 'confirmPassword', 'email', 'telephone','agree'], 'required'],
            // password is validated by validatePassword()
            [['id_role'], 'integer'],
            [['SNP','phone', 'email', 'telephone', 'passwordConfirm'], 'string', 'max'=> 255],
            [['login'], 'unique', 'message' => 'Такой логин уже есть'],
            ['email', 'email', 'message' => 'Некорректная почта'],
            ['email', 'match', 'pattern' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', 'message' => 'неправильнй формат почты'],
            [['email'], 'unique', 'message' => 'Такая почта уже есть'],
            ['SNP', 'match', 'pattern' => '/^[А-Яа-я\s]{5,}$/u', 'message' => 'Только кириллица и пробелы'],
            ['password', 'string', 'min' => 6],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => 'Необходимо согласиться для обработки ваших персональных данных'],

        ];
    }
    public function attributeLabels(){
        return[
            'login' => 'Логин',
            'password' => 'Пароль',
            'SNP' => 'ФИО',
            'passwordConfirm' => 'Повторить пароль',
            'agree' => 'Согласие на обработку данных',
            'email'=> 'Почта',
            'telephone' => 'Телефон',
            'id_role'=>'Id role'
        ];
    }
    //валидация существующей почты
   
    
}