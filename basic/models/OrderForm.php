<?php

namespace app\models;
use yii\base\Model;
use Yii;

class OrderForm extends Model{
    public $order;
    public function rules(){
        return [
        
            
            
        ];
        
        
    }
    
    public function saveOrder($id){
        $order = new Orders;
        $order->customer_id = Yii::$app->user->id;
        $order->freelancer_id = 'my test id';
        $order->title = 'title test';
        $order->description = 'test desc';
        $order->date = date('Y-m-d');
        $order->price = '1000';
        $order->timing = '5';

        return $order->save();
        


        
    }
    
    
    
    
}