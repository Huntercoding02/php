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

<form class="container" method="get">
    <div>
        <input type="radio" id="an" name="sql" value="an">
        วันที่เริ่ม : <br><input type="date" name="an" value="2022-08-11" readonly>
    </div>
    <br>
    <div>
        <input type="radio" id="bd" name="sql" value="bd">

        วันที่เริ่ม : <br><input type="date" name="bd" value="1994-03-17" readonly>
        <br><br>
    </div>
    เลือกวันที่ต้องการเทียบ : <br><input type="date" name="date">
    <br><br>
    <button type="submit" id="btn" name="btn">Submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#btn").click(function(){
            var selected = $("input[name='sql']:checked").val();
            // if (!selected) {
            //     return ("กรุณาเลือกวันที่จะเทียบ");
            //     return false;
            // }
        });
    });
</script>

<div>
    <?php
    $end="";
    if (isset($_GET['btn'])) {
        if (isset($_GET['sql']) && !empty($_GET['sql'])) {
            $selected = $_GET['sql'];
            $start = $_GET[$selected]; // ใช้ค่าที่เลือกจาก radio button
        } else {
            echo '<p style="color:red;">กรุณาเลือกตัวเลือกที่จะเทียบ</p>';
     
        }

        if (isset($_GET['date']) && !empty($_GET['date'])) {
            $end = $_GET['date'];
        } else {
            echo '<p style="color:red;">กรุณาเลือกวันที่จะเทียบ</p>';

        }

        echo '<p style="font-weight:bold;">ผลลัพธ์: ' . cal($start, $end) . '</p>';
    }



        function cal($fix, $var)
        {
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
        ปัจจุบัน : <input type="date" name="hu" id="now" readonly>
        <br><br>
        <button type="submit">Submit</button>
    </form>
    <br>
    <?php
    if (isset($_GET['input']) && isset($_GET['hu'])) {
        $st = $_GET['input'];
        $en = $_GET['hu'];
        echo calbirthday($st, $en);
    }

    function calbirthday($start, $end)
    {
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

    <table border="1">
        <tr>
            <th colspan="3">ชื่อสินค้า</th>
            <th>ราคา</th>
        </tr>
        <tr>
            <td>สินค้า A</td>
            <td>หมวดหมู่ A</td>
            <td>หมวดหมู่ A</td>
            <td>100 บาท</td>
        </tr>
    </table>
    <br><br>
    <table border="1">
        <tr>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th rowspan="2">สต๊อก</th>
        </tr>
        <tr>
            <td>สินค้า A</td>
            <td>100 บาท</td>
        </tr>
        <tr>
            <td>สินค้า B</td>
            <td>200 บาท</td>
            <td>5 ชิ้น</td>
        </tr>
    </table>
    <div>

        <?php
        session_start(); // เริ่ม session

        if (!isset($_SESSION['peo'])) {
            $_SESSION['peo'] = 20; // กำหนดค่าเริ่มต้น
        }

        $jam = 500010;

        if ($jam > 50000) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['click'])) {
                    $_SESSION['peo']++; // เพิ่มค่า
                }
                if (isset($_POST['click_'])) {
                    $_SESSION['peo']--; // ลดค่า
                }

                // ป้องกันการส่งค่าซ้ำเมื่อรีเฟรชหน้า
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }

            echo '<br>';
            echo '<form method="post">';
            echo '<button type="submit" name="click">count</button>';
            echo '<button type="submit" name="click_">del</button>';
            echo '</form>';
            echo 'จำนวน คน: ' . $_SESSION['peo'].'<hr>';
        } else {
            echo 'คะแนนน้อยไป';
        }
        ?>
        <form action="GET">
        <input type="text">
        <button> submit</button>
        </form>
        
        <?php
        
        function getstrtime($init)

        {
            $text_hours  = '';
            $text_mins = '';
            if ($init > 0) {
                $hours = floor($init / 60);
                $minutes = floor(($init / 60) % 60);
                $seconds = $init % 60;
                if ($hours > 0) {
                    $text_hours = $hours . " ชั่วโมง ";
                }
                if ($minutes > 0) {
                    $text_mins = $minutes . " นาที ";
                }
                $txt_duration = $text_hours . $text_mins . $seconds . " วินาที";
            } else {
                $txt_duration = "-";
            }

            return $txt_duration;
        }

        echo '<br>เวลาทั้งหมด' . getstrtime(500).'<br><br><hr>';
        ?>

        <?php
        function DateThai_DB($strDate)
        {
            $strYear = date("Y", strtotime($strDate)) + 543;
            $strMonth = date("n", strtotime($strDate));
            $strDay = date("j", strtotime($strDate));
            //$strHour= date("H",strtotime($strDate));
            //$strMinute= date("i",strtotime($strDate));
            //$strSeconds= date("s",strtotime($strDate));
            $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
            $strMonthThai = $strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";
        }
        echo DateThai_DB(1994-10-10);
        ?>

    </div>
    <?PHP
    require_once("data_store.php");

    // print_r($users);
    $check='';
    $ppl=0;
    for($i=0;$i<count($users);$i++){
        if($users[$i]['user_logo']<=10){
            $check = '0';
        }else{
            $check = '1';
            $ppl++;
        }
        if(!isset($users[$i]['check'])){
            $users[$i]['check'] = $check;
        }
    }
    // print_r($users);
    echo '<style>
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #f2f2f2;
    }
    .color1{
        background-color:red;
    }
        .color2{
        background-color:yellow;
    }
        .color3{
        background-color:blue;
    }
</style>';
    echo '<table >';
    echo '<th  width =5%>no</th><th width =10%>name</th><th width =10%>logo</th><th width =10%>id</th><th width =10%>id01</th><th width =10%>check</th>';
    
    for($i=0;$i<count($users);$i++){
        if($i==0){
            $cass = 'color1';
        }else if($i==1){
            $cass = 'color2';
        }else if($i==2){
            $cass = 'color3';
        }else if($i==14){
            $cass = '';
        }
        echo '<tr class='.$cass.'>';
        echo '<td >'.($i+1).'</td><td>'.$users[$i]['user_name'].'</td><td>'.$users[$i]['user_logo'].'</td><td>'.$users[$i]['user_id'].'</td><td>'.$users[$i]['user_id01'].'</td><td>'.$users[$i]['check'].'</td>';
        echo '</tr>';
    }
    
    echo '</table>';
    ?>
       
</body>

</html>