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
        จำนวนหาร : <input type="number" name="number_div">
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

    }
    if($div>$number_data){
        echo 'ผลหารต้องมากกว่าจำนวนหลัก';
        exit;
    }
}
if(isset($number_data) && isset($div) ){
    multi($number_data,$div);
}else{
    return false;
}

function multi($number_data,$div){
    $even='';
    $evenres=1;
    $val = ' x ';
    $arr =array();
    echo 'จำนวน '.$number_data.' หาร '.$div;
    echo '<br>';
    for($i=1;$i<=$number_data;$i++){
        // if($i == $number_data){
        //     $val = ' = '; 
        // }
        
        // else if(){
        //     $val = ' = '; 
        // } 
        
        if($i %$div == 0){
            $evenres *=$i;

        array_push($arr,$i);
        }
        
    }
    // print_r($arr);
    // echo  "ค่า : ".$even.$evenres;
    // echo '<br>';
//    echo $evenres;
echo mapstring($val,$arr).' = '.$evenres;
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