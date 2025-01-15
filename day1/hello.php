<?php
$hello = "hello world day";
$day =  1;
    echo $hello." ".$day." Naja";
    echo "<hr>";
    echo "New Line END";
    echo "<hr>";
    $x = '5';
    $y = '2';
    $result = $x.$y;
    echo $result;
    for($start=0;$start<=4;$start++){
        echo "<br>";
        echo $hello." ".($start+1);
        echo "<hr>";
    }
    $number = 60;
    if($number === 99){
        echo "YES";
    }elseif($number === '99'){
        echo "Number is String";

    }else{
        echo "NO";
        echo "<hr>";
    }

    if($number >=80){
        echo "<br>";
        echo "A";
    }elseif($number >=70){
        echo "<br>";
        echo "B";
    }elseif($number >=60){
        echo "<br>";
        echo "C";
    }elseif($number >=50){
        echo "<br>";
        echo "D";
    }else{
        echo "<br>";
        echo "F";
    }
?>