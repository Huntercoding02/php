<?php
// function loop($y){
//     for($i=1;$i<=$y;$i++){
//         for($j=1;$j<=$i;$j++){
//             echo $j;
//         }
//         echo '<br>';
//     }
// }
// loop(5);
// $_POST['name_submit']; 

if(!isset($_POST['name_submit']) || $_POST['name_submit']==''){
    $response = array('ret_code'=>'202','msg'=>"Empty input","data"=>"");
    echo json_encode($response);
    exit;
}
$y =$_POST['name_submit'];
if(is_numeric($y)==1){
    
    if(is_numeric($_POST['name_submit']) ){
        $dataFunction = fac($y);
        $response = array('ret_code'=>'201','msg'=>"success","data"=> $dataFunction);
        echo json_encode($response);
        // echo "<pre>";
        // print_r($response);
        exit;
    }
}else{
    $response = array('ret_code'=>'203','msg'=>"pls input only numb","data"=>"");
    echo json_encode($response);
    exit;
}

function fac ($x){
    $result = 1;
    $pros="";
    if($x==0){
        $result = '1';
    }
 for($i=$x;$i>=1;$i--){
    if($i==$x){
         $pros .= $i;
    }else{
         $pros .= '*'.$i;
        
    }
    // echo $pros;
    $result = ($result*($i));
 }
 $data_return = array("result"=>$result,"pros"=>$pros);
 return  $data_return;
//  echo ' = '.$result;
 
}

// function Factorial($number){ 
//     if($number <= 1){ 
//         return 1; 
//     } 
//     else{ 
//         echo $number * Factorial($number - 1); 
//     } 
// }
// echo Factorial($y);

// function fac ($x){
//     $result = 1;
//     if($x==0){
//         echo '0';
//     }
//  for($i=$x;$i>=1;$i--){
//     if($i==$x){
//         echo $i;
//     }else{
//         echo '*'.$i;
        
//     }
//     $result *= ($i);
    
//  }

//  echo ' = '.$result;
// }
// fac(7)


// echo  $result = $x*$i;
// function fac($x){
//     for($i=1;$i<=$x;$i++){
//         if($i==1){
//             echo $i;
//         }else{
//             echo '*'.$i;
//         }
        
        
//     }

// }


// function loop($x){
// //     $x =5;
// // $y=1;
// //     for($i=0;$i<=$x;$i++){
// //         echo $y.'<br>';
// //         $y =$i;
// //     }
// // echo loop($x);
// }
// loop(5);
?>

