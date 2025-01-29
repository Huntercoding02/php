<?PHP
echo'<form action="" method="POST">
    จำนวนชั้นที่ต้องการ : <input type="number" name="number">
    <button type="submit" >Submit</button>
    </form>';
    
    $number_data = $_POST;
    
   
function cal($number_data){
       
    for($i=0;$i<$number_data;$i++){
        echo 'X';
        
        for($j=0;$j<$number_data;$j++){
         
            if($i>$j){
                echo 'X'; 
            }
            else{
                echo 'O';   
            }
    }
    echo '<br>';
    }
    
//     for($i=0;$i<$number_data;$i--){
//         echo '<br>';
//     for($j=0;$j<$i;$j--){
//         echo 'O';
//     }
// }
}

echo cal($number_data);  
?>