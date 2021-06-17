<?php 


public function rules() {

    return [

        [['image'], 'safe'],

        [['image'], 'file', 'types' => 'jpg'],

    ];

}

?>