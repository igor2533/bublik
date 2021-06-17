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
            [['user'], 'required'],
            [['title', 'price', 'description', 'date'], 'string'],
            [['user'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'date' => 'Date',
        ];
    }
}
