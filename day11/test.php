<?PHP
function test($n){
    $res=0;
    $val=' + ';
    $start = time();
    $arr = [];
    for($i=1;$i<=$n;$i++){
        
        if($i == $n){
            $val = ' = '; 
        }
    //echo $i.$val;
        $res += $i;
    }
    $end =time();
    $arr[] =[
       'res'=>$res
    ];
    echo $arr['0']['res']."hi";
    print_r($arr);
    echo $end.'time';
    echo $start."start";
    echo $end."end";
    echo '<br>';
    echo $end - $start;
    echo '<br>';
    echo $res."res";
}
test(10);


function cal($ne){
    echo '<br>';
  echo $res=($ne*($ne+1))/2;

}
cal(1000000000)
?>