<?php
    class car{
    public $model;
    public $color;

    public function __construct($model,$color){
        $this->model =$model;
        $this->color=$color;
    }
    public function display_test(){
        return "Car Model : " . $this->model . "Car color : ".$this->color;
    }
    }
    echo '<pre>';
    $mybenz = new car("red","toyota");
    echo $mybenz->display_test();
    echo '<br>';
    $mybenz = new car("red","benz");
    echo $mybenz->display_test();

?>