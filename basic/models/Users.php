<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $pass
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    public $file;
    public $user = false;

 // 5 abstact methods
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public static function 
    findIdentityByAccessToken($token, $type = null)
    {
      
    }
    
    public function getAuthKey()
    {
       
    }

    public function validateAuthKey($authKey)
    {
      
    }

    public function getUser()
    {
      if ($this->user === false) {
    $this->user = Users::findOne(['username'=>$this->username, 
                                  'pass'=>$this->pass]);
      }
           
     return $this->user;
   }


    public function login()
    {
        if ($this->validate()) {
        return Yii::$app->user->login($this->getUser());
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'pass'], 'required'],
            [['username', 'pass'], 'string', 'max' => 50],
            ['pass', 'validatePassword'],
            [['file'], 'file'],
        ];
    }


    public static function  getAll(){
            
        return Users::find()->all();
    }

 


//need fix
//
//




public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if(!$this->getUser())
            {
                if (Yii::$app->user->id == null) {  $this->addError($attribute, 'Неверный пароль');}

          
            } 
        }
    }
//
//
//
//need fix
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'level' => 'Level',
            'pass' => 'Pass',
        ];
    }
}
