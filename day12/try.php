

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
$array_info = [
    (object) [
        "stategifted" => "love",
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
        "scene" => 2
    ],
    (object) [
        "stategifted" => "happy",
        "order" => 2,
        "money" => 200,
        "gift_num" => 2,
        "gift_gold_total" => 2000.00,
        "ctime" => "2025-02-07 11:15:30",
        "gift_id" => 102,
        "gift_name" => "Chocolate",
        "user_idx_receive" => "user003",
        "user_uid_receive" => "uid003",
        "user_idx" => "user004",
        "user_uid" => "uid004",
        "receive_type" => 2,
        "item_order_no" => "ORD1002",
        "scene" => 3
    ],
    (object) [
        "stategifted" => "grateful",
        "order" => 3,
        "money" => 50,
        "gift_num" => 1,
        "gift_gold_total" => 500.00,
        "ctime" => "2025-02-07 12:30:10",
        "gift_id" => 103,
        "gift_name" => "Teddy Bear",
        "user_idx_receive" => "user005",
        "user_uid_receive" => "uid005",
        "user_idx" => "user006",
        "user_uid" => "uid006",
        "receive_type" => 1,
        "item_order_no" => "ORD1003",
        "scene" => 1
    ],
    (object) [
        "stategifted" => "thankful",
        "order" => 4,
        "money" => 300,
        "gift_num" => 2,
        "gift_gold_total" => 3000.00,
        "ctime" => "2025-02-07 13:45:25",
        "gift_id" => 104,
        "gift_name" => "Perfume",
        "user_idx_receive" => "user007",
        "user_uid_receive" => "uid007",
        "user_idx" => "user008",
        "user_uid" => "uid008",
        "receive_type" => 2,
        "item_order_no" => "ORD1004",
        "scene" => 2
    ],
    (object) [
        "stategifted" => "joyful",
        "order" => 5,
        "money" => 500,
        "gift_num" => 3,
        "gift_gold_total" => 5000.00,
        "ctime" => "2025-02-07 14:10:50",
        "gift_id" => 105,
        "gift_name" => "Watch",
        "user_idx_receive" => "user009",
        "user_uid_receive" => "uid009",
        "user_idx" => "user010",
        "user_uid" => "uid010",
        "receive_type" => 3,
        "item_order_no" => "ORD1005",
        "scene" => 3
    ],
    (object) [
        "stategifted" => "caring",
        "order" => 6,
        "money" => 150,
        "gift_num" => 1,
        "gift_gold_total" => 1500.00,
        "ctime" => "2025-02-07 15:20:15",
        "gift_id" => 106,
        "gift_name" => "Flowers",
        "user_idx_receive" => "user011",
        "user_uid_receive" => "uid011",
        "user_idx" => "user012",
        "user_uid" => "uid012",
        "receive_type" => 1,
        "item_order_no" => "ORD1006",
        "scene" => 1
    ],
    (object) [
        "stategifted" => "respect",
        "order" => 7,
        "money" => 250,
        "gift_num" => 2,
        "gift_gold_total" => 2500.00,
        "ctime" => "2025-02-07 16:35:40",
        "gift_id" => 107,
        "gift_name" => "Book",
        "user_idx_receive" => "user013",
        "user_uid_receive" => "uid013",
        "user_idx" => "user014",
        "user_uid" => "uid014",
        "receive_type" => 2,
        "item_order_no" => "ORD1007",
        "scene" => 2
    ],
    (object) [
        "stategifted" => "cheerful",
        "order" => 8,
        "money" => 350,
        "gift_num" => 3,
        "gift_gold_total" => 3500.00,
        "ctime" => "2025-02-07 17:50:05",
        "gift_id" => 108,
        "gift_name" => "Gift Card",
        "user_idx_receive" => "user015",
        "user_uid_receive" => "uid015",
        "user_idx" => "user016",
        "user_uid" => "uid016",
        "receive_type" => 3,
        "item_order_no" => "ORD1008",
        "scene" => 3
    ],
    (object) [
        "stategifted" => "appreciation",
        "order" => 9,
        "money" => 400,
        "gift_num" => 1,
        "gift_gold_total" => 4000.00,
        "ctime" => "2025-02-07 18:25:30",
        "gift_id" => 109,
        "gift_name" => "Necklace",
        "user_idx_receive" => "user017",
        "user_uid_receive" => "uid017",
        "user_idx" => "user018",
        "user_uid" => "uid018",
        "receive_type" => 1,
        "item_order_no" => "ORD1009",
        "scene" => 1
    ],
    (object) [
        "stategifted" => "generosity",
        "order" => 10,
        "money" => 450,
        "gift_num" => 2,
        "gift_gold_total" => 4500.00,
        "ctime" => "2025-02-07 19:40:10",
        "gift_id" => 110,
        "gift_name" => "Smartphone",
        "user_idx_receive" => "user019",
        "user_uid_receive" => "uid019",
        "user_idx" => "user020",
        "user_uid" => "uid020",
        "receive_type" => 2,
        "item_order_no" => "ORD1010",
        "scene" => 2
    ]
];
    
      $count = 1;
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