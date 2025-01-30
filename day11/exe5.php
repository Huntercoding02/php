<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .o {
        color: red;
    }
</style>

<body>
    <h3>ผลคู่และคี่</h3>
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
        echo "Invalid Input2";
        exit;
    }
}
if(isset($number_data)){
    sum($number_data);
}else{
    return false;
}

function sum($number_data){
    $odd='';
    $even='';
    $oodres=0;
    $evenres=0;
    $val = ' + ';
    echo 'จำนวน '.$number_data;
    echo '<br>';
    for($i=1;$i<=$number_data;$i++){
        if($i == $number_data){
            $val = ' = '; 
        }else if($i == $number_data-1){
            $val = ' = '; 
        } 
        if($i %2 == 0){
            $even .=$i.$val;
            $evenres +=$i;
        }else{
            $odd .=$i.$val;
            $oodres +=$i;
        }
        
    }
    echo "คู่ : ".$even.$evenres;
    echo '<br>';
    echo "คี่ : ".$odd.$oodres;  
}


?>