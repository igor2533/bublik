<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "response".
 *
 * @property int $id
 * @property string $customer_id
 * @property string|null $id_request
 * @property string|null $freelancer_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $date
 * @property string|null $price
 * @property string|null $timing
 */
class Response extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'response';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['id_request', 'freelancer_id', 'title', 'description', 'date', 'price', 'timing'], 'string'],
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
            'id_request' => 'Id Request',
            'freelancer_id' => 'Freelancer ID',
            'title' => 'Title',
            'description' => 'Description',
            'date' => 'Date',
            'price' => 'Price',
            'timing' => 'Timing',
        ];
    }
}
