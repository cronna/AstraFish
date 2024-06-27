<?php

namespace app\entity;

use Yii;
use app\repository\UserRepository;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 *
 * @property Clients[] $clients
 * @property Staff[] $staff
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $username;

    public static function findIdentity($id)
    {
        return new static(UserRepository::getUserById($id));
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        
    }
    public function getId()
    {
        return $this->id;
    }

    public function validatePassword($password){
        return password_verify($password, $this->password);
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login', 'password'], 'string', 'max' => 255],
            ['login', 'validateLogin']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    /**
     * Gets query for [[Clients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Clients::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::class, ['user_id' => 'id']);
    }

    public function validateLogin($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = UserRepository::getUserByLogin($this->login);
            if ($user) {
                $this->addError($attribute, 'Этот login занят!');
            }
        }
    }

    public function getAuthKey(){}
    public function validateAuthKey($authKey){}

}
