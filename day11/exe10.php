<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .o{
        color: red;
    }
    
</style>
<body>
    <h3>วาดรูปพีระมิด</h3>
    <form method="GET">
        จำนวนชั้นที่ต้องการ : <input type="number" name="number">
        <button type="submit" name="submit" value="sub">Submit</button>
    </form>
    <hr>

</body>

</html>
<?PHP


if (isset($_GET['submit']) && $_GET['submit'] != '') {
    if (isset($_GET['number']) && $_GET['number'] != '') {
        $number_data = $_GET['number'];
       
    } else {
        echo "Invalid Input";
        exit;
    }
}
if(isset($number_data)){
    cal($number_data);
}else{
    return false;
}

// function cal($number_data)
// {
//     $x =1;

//     for ($i = 1; $i < $number_data+1; $i++) {
        
//         for($j=$number_data-$i;$j>0;$j--){ 
//                 echo " &nbsp ";  
//         }
//         // $row = [];
//         for ($j = 0; $j < $i; $j++) {
//             // $row = $x;
           
//             if($i%2==0){
//                 // echo strrev($x)." ";
//             //   echo $row = array_reverse($row);
//             // array_push($row,$x);
//             // print_r(array_reverse($row));
//                 echo $x." ";
//             }else{
//                 echo $x." ";
//             }
//             $x++;
//         }
//         echo '<br>';
     
//     }
// }

function cal($number_data)
{
    $x = 1;

    for ($i = 1; $i <= $number_data; $i++) {
        for ($j = $number_data - $i; $j > 0; $j--) {
            echo " &nbsp ";
        }

        if ($i % 2 == 0) {
            
            $start = $x + $i - 1;
           
            for ($j = 0; $j < $i; $j++) {
                echo $start-- . " ";
                $x++;
            }
        } else {
           
            for ($j = 0; $j < $i; $j++) {
                echo $x . " ";
                $x++;
            }
        }
        
        echo '<br>';
    }
}
?>