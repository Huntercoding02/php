

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Test</title>
    <style>
        table{
           
            text-align: center;
            border-collapse: collapse;
            border: 1px solid black;
        }
        th{
            border: 1px solid black;
            padding: 5px;
        }
        .top{
            display: flex;
            justify-content: center;
            align-items: center;
            /* text-align: center; */
        }
        td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    
    <button id="myBtn" >Click here for rank preview</button>

    
    
    <div id="rank" style="display: none;">
    <h2>Gift Information Table</h2>

<table>
    <thead>
        <tr>
            <th>Order</th>
            <th>Gift Name</th>
            <th>Gold Total</th>
            <th>Money</th>
            <th>Gift Number</th>
            <th>State Gifted</th>
            <th>Received By</th>
            <th>Receive Type</th>
            <th>Time</th>
            <th>Scene</th>
            <th>Total spend</th>
        </tr>
    </thead>
    <tbody>
  
        <?php

    require_once('data.php');

    $limit = 10; // จำนวนข้อมูลต่อหน้า
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // รับค่าหน้าปัจจุบันจาก URL
$offset = ($page - 1) * $limit; // คำนวณ OFFSET

// นับจำนวนข้อมูลทั้งหมด
$total_records = count($array_info);
$total_pages = ceil($total_records / $limit);

// ตัดข้อมูลให้เหลือเฉพาะหน้าที่เลือก
$array_info = array_slice($array_info, $offset, $limit);

      $count = 1;
    //   print_r($users);
        foreach ($array_info as $item) : 
            $mult_money = $item->money*$item->gift_num
        ?>
        
            <tr>
                <td><?= $count++ ?></td>
                <td><?= $item->stategifted ?></td>
                <td><?= number_format($item->gift_gold_total, 2) ?></td>
                <td><?= number_format($item->money, 2) ?></td>
                <td><?= $item->gift_num ?></td>
                <td><?= ucfirst($item->stategifted) ?></td>
                <td><?= $item->user_idx_receive ?></td>
                <td><?= $item->receive_type ?></td>
                <td><?= $item->ctime ?></td>
                <td><?= $item->scene?></td>
                <td><?= $mult_money?></td>
            </tr>
            <?php endforeach; ?>
    </tbody>
    <?php if ($total_pages > 1) : ?>
    <div style="text-align: center; margin-top: 20px;">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <a href="?page=<?= $i ?>" 
               style="margin: 5px; padding: 8px 12px; 
                      text-decoration: none; 
                      <?= ($i == $page) ? 'background-color: #F00; color: white; font-weight: bold;' : 'background-color: #CCC; color: black;' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>
<?php endif; ?>
</table>
</div>
    <script>
        $(document).ready(function(){
            $('#myBtn').click(function(){
                var x = document.getElementById("myBtn")
                if(x.innerHTML == "Click here for rank preview"){
                    x.innerHTML = "Click here for hide rank preview";
                }else{
                    x.innerHTML = "Click here for rank preview";
                }
                $('#rank').slideToggle(500);
            })
           
        })
    </script>
       <!-- <th class="top">Top Ranking</th> -->
       <?PHP
        // $x=array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
        // // print_r($x);
        // echo '<table class="o">';
        // echo "<th>number</th><th>type</th><th>name</th>";
        // // echo count($x);
        // echo '</table>';
        ?>

</body>
</html>