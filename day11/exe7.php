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
        จำนวนต้องการ : <input type="number" name="number">
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
        echo "Pls input numbers";
        exit;
    }
    if($number_data =='0'){
        echo '0 ไม่มีค่า';
        exit;
    }
}
if(isset($number_data) ){
    multi($number_data);
}else{
    return false;
}

function multi($number_data){
    $even='';
    $odd='';
    $evenres=0;
    $oddres=0;
    $val = ' + ';
    $arr_even =array();
    $arr_odd= array();
    echo 'จำนวน '.$number_data;
    echo '<br>';
    for($i=1;$i<=$number_data;$i++){
        // if($i == $number_data){
        //     $val = ' = '; 
        // }
        
        // else if(){
        //     $val = ' = '; 
        // } 
        
        if($i %2== 0){
            $evenres +=$i;

        array_push($arr_even,$i);
        }else{
            $oddres +=$i;
        array_push($arr_odd,$i);
        }
        
    }
    $sum_num = $evenres * $oddres;
    // print_r($arr);
    // echo  "ค่า : ".$even.$evenres;
    // echo '<br>';
//    echo $evenres;
echo mapstring($val,$arr_even).' = '.$evenres;
echo '<br>';
echo mapstring($val,$arr_odd).' = '.$oddres;
echo '<br>';
echo mapstring($val,$evenres).$evenres.' x '.$oddres.' = '.$sum_num;
}



$symbol = ' x ';



function mapstring($symbol,$list){
    $res_string ="";
if(is_array($list)){
    for($i=0;$i<count($list);$i++){
        
        if($i == count($list)-1){
            $res_string .=$list[$i];
        }else{
            $res_string .=$list[$i].$symbol;
        }
    }
}
   echo $res_string;
}

?>