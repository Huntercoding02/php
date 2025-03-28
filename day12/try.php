

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
    <!-- "stategifted" => "love",
        "order" => 1,
        "money" => 100,
        "gift_num" => 1,
        "gift_gold_total" => 1000.00,
        "ctime" => "2025-02-07 10:21:45",
        "gift_id" => 101,
        "gift_name" => "Rose",
        "user_idx_receive" => "user001",
        "user_uid_receive" => "uid001",
        "user_idx" => "user002",
        "user_uid" => "uid002",
        "receive_type" => 1,
        "item_order_no" => "ORD1001",
        "scene" => 2 -->
        <?php

    require_once('data.php');
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