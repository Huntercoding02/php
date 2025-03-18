<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>unit</title>
</head>
<body>
    <form method="GET">
    จำนวนยูนิต : <input type="number" name="inp" placeholder="จำนวนยูนิต">
    <button type="submit" name="btn" value="sub">Submit</button>
    <hr>
    </form>
    ผลลัพธ์ : 
</body>
</html>
<?PHP
if(isset($_GET['btn'])&& $_GET['btn'] != ''){
    if(isset($_GET['inp']) && $_GET['inp'] != ''){
        $val = $_GET['inp'];
    }else{
        echo 'pls input value';
        exit;
    }
    
}
if(isset($val)){
    echo water($val);
}else{
    return false;
}
function water($unit){ 
    $first= 0;
    $sec= 0;
    $third= 0;
    $fourth = 0;
 for($i=1;$i<=$unit;$i++){
    echo '<pre>';
    if($i>=1 && $i<=10){
        $first = $i*5;
    }else if($i>=11 && $i<=20){
        $sec = ($i-10)*10;  
    }else if($i>=21 && $i<=30){
        $third = ($i-20)*30;
    }else if($i>=31){
        $fourth = ($i-30)*50;
    }
 }

echo 'ค่าน้ำ : '.$first + $sec + $third + $fourth+ '50';

}
// echo water(39);



?>
