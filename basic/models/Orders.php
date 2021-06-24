<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $customer_id
 * @property string|null $freelancer_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $date
 * @property string|null $price
 * @property string|null $timing
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['freelancer_id', 'title', 'description', 'date', 'price', 'timing'], 'string'],
            [['customer_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'freelancer_id' => 'Freelancer ID',
            'title' => 'Title',
            'description' => 'Description',
            'date' => 'Date',
            'price' => 'Price',
            'timing' => 'Timing',
        ];
    }



    public function getAuthor(){
    
        return $this->hasOne(Users::className(), ['id'=>'freelancer_id']);
        
    }









}
