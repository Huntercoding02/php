<?PHP
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
echo '<br>';
echo $first + $sec + $third + $fourth+ '50';

}
echo water(39);
?>