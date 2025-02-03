<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid black;
        }
        th{
            border-collapse: collapse;
            border: 1px solid black;
        }
        td{
            border-collapse: collapse;
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    ตารางสูตรคูณตั้งแต่แม่ 2 ถึง 25
</body>
</html>
<?PHP

$start = '2';
$div = '12';
$total = '100';
echo cal_x($start,$div,$total);
function cal_x($start,$div,$total){
    $split_rows = (int)($total/$div);
    $print_data = "";
    for($x=1;$x<=$split_rows+1;$x++){
        $print_data .= "<table border='1'>";
        $stop = ($div*$x);
     
        if($x>1){
            $start = ($stop - $div)+1; 
        }else{
            //$start = ($stop - $div);
        }
        for($i=$start; $i<=$stop; $i++){
            $print_data .= '<th>'.'แม่ '.$i.'</th>';
        }
        for($i=1; $i<=12; $i++){
            $print_data .= '<tr>';
            for ($j=$start; $j<=$stop; $j++){
                $print_data .= "<td>".$j." x ". $i  . " = ".$j*$i."</td>";
            }
            $print_data .= '</tr>';
        }
        $print_data .= "</table>";
        $print_data .= "<br>";
    }
    return $print_data;
}

// function cal($start,$stop){
//     echo "<table border='1'>";
//     for($i=$start; $i<=$stop; $i++){
//     echo '<th>'.'แม่ '.$i.'</th>';
//     }
//     for($i=1; $i<=12; $i++){
//         echo '<tr>';
//         for ($j=$start; $j<=$stop; $j++){
//             echo "<td>".$j." x ". $i  . " = ".$j*$i."</td>";
//         }
//         echo '</tr>';
//     }
//     echo "</table>";
// }
// //echo cal(2,13);


// //echo "<table border='1'><br />";
// function cal2($start,$stop){
//     for($i=$start; $i<=$stop; $i++){
//     echo '<th>'.'แม่ '.$i.'</th>';
//     }
//     echo '<tr>';
//     for($i=1; $i<=12; $i++){
        
//         for ($j=$start; $j<=$stop; $j++){
//             echo "<td>".$j." x ". $i  . " = ".$j*$i."</td>";
//         }
//         echo '</tr>';
//     }
// }
//echo cal2(14,25);
//echo "</table>";

?>