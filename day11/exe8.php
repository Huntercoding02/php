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
    <h3>เงื่อนไขขั้นสูง</h3>
    <form method="GET">
        จำนวนต้องการ : <input type="number" name="number">
        <br>
        จำนวนหาร : <input type="number" name="number_div">
        <br>
        จำนวน mod :  <input type="number" name="number_mod">
        <br>
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
    if (isset($_GET['number_div']) && $_GET['number_div'] != '') {
        $div = $_GET['number_div'];

    }else {
        echo "Pls input number div";
        exit;
    }
    if (isset($_GET['number_mod']) && $_GET['number_mod'] != '') {
        $mod = $_GET['number_mod'];

    }else {
        echo "Pls input numbers mod";
        exit;
    }
    // if($number_data%$div!=0){
    //     echo 'No numbers found';
    //     exit;
    // }
    if($div>$number_data || $mod < 1){
        echo 'Invalid input';
        exit;
    }
}
if(isset($number_data) && isset($div) && isset($mod)){
    multi($number_data,$div,$mod);
}else{
    return false;
}

function multi($number_data,$div,$mod){
    $evenres=1;
    $val = ' x ';
    $arr =array();
    $m = array();
    $minus =0;
    echo 'จำนวน '.$number_data.' หาร '.$div. ' mod '.$mod ;
    echo '<br>';
    // echo $mod;
    
    for($i=1;$i<=$number_data;$i++){
        if($i %$div == 0){
         $evenres =$evenres * $i;
        array_push($arr,$i);
        array_push($m,$i);
        }
    }
    $minus = count($m) - $mod;

$arr_res = array_slice($m,$minus);

echo mapstring($val,$arr_res);
}

function mapstring($symbol,$list){
    $res_string ="";
    $res_num =1;
    $res_mod = 1;
if(is_array($list)){
    for($i=0;$i<count($list);$i++){
        if($i == count($list)-1){
            $res_string .=$list[$i];

        }else{
            $res_string .=$list[$i].$symbol;
        }
        $res_num *=$list[$i];
        $res_mod = $res_num % 1000000;
    
    }
  
}
   echo $res_string;
   echo ' = '.number_format($res_num);
   echo '<br>';
   echo 'Products (mod 10^6) : '.number_format($res_mod);

}

?>