<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class EntryForm extends Model
{
    public $title;
    public $price;

    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
         
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'title' => 'Title',
            'price' => 'Price',
            'description' => 'Description',
            'date' => 'Date',
        ];
    }
}