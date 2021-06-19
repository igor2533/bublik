<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $user
 * @property string|null $title
 * @property string|null $price
 * @property string|null $description
 * @property string|null $date
 */
class Request extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         
            [['title', 'price', 'description', 'date'], 'string'],
            [['user'], 'string', 'max' => 255],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }




    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'title' => 'Title',
            'price' => 'Price',
            'status' => 'Status',
            'description' => 'Description',
            'date' => 'Date',
        ];
    }


//disable - enable request in site
    public function isAllowed()
    {
         return $this->status;
    }
    
    
    public function allow(){
        $this->status = 1;
        return $this->save(false);
    }
    
      public function disallow(){
        $this->status = 0;
        return $this->save(false);
    }
    


//get user
    // public function getUser()
    // {
    //     return $this->hasOne(Users::className(), ['id' => 'user']);
    // }

    public function getAuthor(){
    
        return $this->hasOne(Users::className(), ['id'=>'user']);
        
    }







}
