<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Test</title>
    <style>
        table {
            text-align: center;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            margin: 5px;
            padding: 8px 12px;
            text-decoration: none;
            background-color: #ddd;
            color: black;
            border-radius: 5px;
        }

        .pagination a:hover {
            background-color: #888;
            color: white;
        }

        .pagination a.active {
            background-color: #F00;
            color: white;
            font-weight: bold;
        }

        #myBtn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 10px 0;
        }

        #myBtn:hover {
            background-color: #45a049;
        }

        #rank {
            margin-top: 20px;
        }

        .top {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    
    <button id="myBtn">Click here for rank preview</button>

    <div id="rank" style="display: none;">
        <h2>Gift Information Table</h2>

        <div id="giftTable">
        <?php
// data.php: Here is an example data array for simulation
// This should be replaced with your actual data source.
require_once('data.php');

$limit = 15; // จำนวนข้อมูลต่อหน้า
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // รับค่าหน้าปัจจุบันจาก URL
$offset = ($page - 1) * $limit; // คำนวณ OFFSET

// นับจำนวนข้อมูลทั้งหมด
$total_records = count($array_info);
$total_pages = ceil($total_records / $limit);

// ตัดข้อมูลให้เหลือเฉพาะหน้าที่เลือก
$array_info = array_slice($array_info, $offset, $limit);

$count = 1; // เริ่มที่ 1 ทุกหน้า
?>

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
        <?php foreach ($array_info as $item): 
            $mult_money = $item->money * $item->gift_num;
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
                <td><?= $item->scene ?></td>
                <td><?= number_format($mult_money, 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php //if ($total_pages > 1): ?>
    <!-- <div class="pagination">
        <//?php// for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<//?= $i ?>" 
               class="<//?= ($i == $page) ? 'active' : '' ?>">
                <//?= $i ?>
            </a>
        <//?php// endfor; ?>
    </div> -->
<?php //endif; ?>

<?PHP
 if ($total_pages > 1) {
    echo '<label>หน้าที่ [ ';
    for ($i = 1; $i <= $total_pages; $i++) {
        $color = ($i == $page) ? 'style="color:#F00; font-weight:bold;"' : '';
        echo '<a href="?page=' . $i . '" ' . $color . '>' . $i . '</a>';
        if ($i < $total_pages) {
            echo ' | ';
        }
    }
    echo ' ]</label>';
} 
?>

        </div> <!-- This will hold the dynamically loaded data -->

    </div>

    <script>
        $(document).ready(function(){
            // Show or hide the rank table
            $('#myBtn').click(function(e){
                var x = document.getElementById("myBtn");
                if(x.innerHTML == "Click here for rank preview"){
                    x.innerHTML = "Click here for hide rank preview";
                } else {
                    x.innerHTML = "Click here for rank preview";
                }
                $('#rank').slideToggle(500);
            });

           
        });
    </script>

</body>
</html>

