<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>An</title>
    <style>
        button {
            display: flex;
            justify-content: center;
        }
        .container {
            margin: 0px auto;
            padding: 5px;
        }
    </style>
</head>
<body>

<!-- ✅ ฟอร์มแยกเฉพาะ input -->
<form class="container" method="get">
    วันที่เริ่ม : <br><input type="date" name="fix" value="2022-08-11" readonly> 
    <br><br>
    เลือกวันที่ต้องการเทียบ : <br><input type="date" name="an"> 
    <br><br>
    <button type="submit" name="btn">Submit</button>
</form>

<!-- ✅ แสดงผลลัพธ์แยกออกจากฟอร์ม -->
<div>
    <?php
    if(isset($_GET['fix'])) {
        if($_GET['fix'] !== '2022-08-11') {
            echo '<p style="color:red;">อย่าซน</p>';
     
        } else {
            $start = $_GET['fix'];
        }
    }

    if(isset($_GET['btn'])) {
        if(isset($_GET['an']) && $_GET['an'] != '') {
            $end = $_GET['an'];
        } else {
            echo '<p style="color:red;">กรุณาเลือกวันที่</p>';
 
        }
    }

    if(isset($start) && isset($end)) {
        echo '<p style="font-weight:bold;">ผลลัพธ์: ' . cal($start, $end) . '</p>';
    }

    function cal($fix, $var) {
        $startDate = new DateTime($fix);
        $endDate = new DateTime($var);
        $interval = $startDate->diff($endDate);
        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;
        return "$years years, $months months, and $days days";
    }
    ?>
</div>

<hr>

<!-- form BD -->
<form method="GET">
    วัน : <input type="date" name="input" value="2025-03-17" readonly> 
    ปัจจุบัน : <input type="date" name="hu" id="now"readonly>
    <br><br>
    <button type="submit">Submit</button>
</form>
<br>
<?php
if(isset($_GET['input']) && isset($_GET['hu'])){
    $st = $_GET['input'];
    $en = $_GET['hu'];
    echo calbirthday($st, $en);
}

function calbirthday($start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $total = $start->diff($end);
    $years = $total->y;
    $months = $total->m;
    $days = $total->d;
    return "$years years, $months months, and $days days";
}
?>

<script>
    // ตั้งค่าวันที่ปัจจุบันให้กับ input[name="hu"]
    document.getElementsByName("hu")[0].valueAsDate = new Date();
</script>


</body>
</html>
