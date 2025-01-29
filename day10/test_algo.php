
<?PHP
$arr = array(44,5,6,3,6,7,0,122,43,53,51,80,77);
// //ให้เขียน function sort เรียงตัวเลขจากมากไปหาน้อยโดยที่ไม่ใช้ function build in ของ php

// $arr_sum=[];
// $arr_less=[];
// // echo;
for($i=0;$i<count($arr);$i++){
    // print_r($arr[$i]." ");
    echo 'I='.$i;
 for($j=0;$j<$i;$j++){
    echo "J=".$j." ";
    // print_r($arr[$j]."-");
    if($arr[$i]>$arr[$j]){
        $temp = $arr[$i];
        $arr[$i] =$arr[$j];
        $arr[$j] = $temp;
    }
 }
 echo "<br>";

// }
// print_r($arr);
// $arr2 = array(44,5,6,3,6,7,0,122,43,53,51,80);
// for($i=0;$i<count($arr2)-1;$i++){
//     // print_r($arr[$i]." ");
//     echo 'I='.$i;
//  for($j=0;$j<count($arr2)-1-$i;$j++){
//     echo "J=".$j." ";
//     // print_r($arr[$j]."-");
//     if($arr2[$j]<$arr2[$j+1]){
//         $temp = $arr2[$j];
//         $arr2[$j] =$arr2[$j+1];
//         $arr2[$j+1] = $temp;
//     }
//  }
//  echo "<br>";

}
echo "<pre>";
print_r($arr);
// $less.array_push($arr[$i])
?>