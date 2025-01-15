<?php
// echo "<pre>";
// print_r($_GET);
// // echo $_GET['data1'] ;
// echo "<hr>";
// print_r($_POST);
var_dump($_POST);
if(isset($_POST['submit']) && $_POST['submit'] !=''){
    if(isset($_POST['number_data']) && $_POST['number_data'] !=''){
        $number_data = $_POST['number_data'];
    }else{
        echo "Invalid Input2";
        exit;
    }
    
    echo cal($number_data);
}else{
    echo "Invalid Input";
    exit;
}
function cal($number_data){
   
    $result = "Cannot Call";
    if($number_data >=80){
        $result ="A";
    }else if($number_data >=70){
        $result = "B";
    }else if($number_data >=60){
        $result = "C";
    }else if($number_data >=50){
        $result = "D";
        
    }else{
        $result = "F";
    }
    return $result;
}


?>