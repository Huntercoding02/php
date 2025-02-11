<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid black;
            margin:0px auto;

        }
        th{
            background-color: burlywood;
            border: 1px solid black;
        }
        td{
            text-align: center;
            border: 1px solid black;
        }
        .tr_col{
            background-color: aliceblue;
        }
        .tr_col1{
            background-color: whitesmoke;
        }
        .button-container {
        text-align: center;
        /* margin-top: 20px;  */
    }

    </style>
    <title>Show table</title>
</head>
<body>
    <div class="button-container ">
    <button id="BTM" style="margin:0px auto;">Click to see table</button>
    </div>
    <button id="back" style="margin:0px auto;">Back to again page</button>
    <div id="table" style="display: none;">
        <h1 style="text-align: center;">Show info</h1>
        <table >
        <?PHP
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
                "money" => 10,
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
                "gift_name" => "",
                "user_idx_receive" => "user019",
                "user_uid_receive" => "uid019",
                "user_idx" => "user020",
                "user_uid" => "uid020",
                "receive_type" => 2,
                "item_order_no" => "ORD1010",
                "scene" => 2
            ]
        ];
        echo '<th>No.</th> <th>gift_name</th> <th>stategifted </th><th>VJ</th><th>user_uid</th><th>receive_type</th><th>Money</th><th>Total</th><th> Gold</th><th>Total gold</th><th>Time</th>';
        $count=1;
        $total_gold_spend = 0;
        for($i=0;$i<count($array_info);$i++){
            $color = ($count % 2 == 0) ? "tr_col" : "tr_col1";
            $total = $array_info[$i]->money * $array_info[$i]->gift_num;
            $total_gold =$array_info[$i]->money * $array_info[$i]->gift_gold_total;
            $total_gold_spend +=$total_gold;
            echo '<tr class="'.$color.'">';
           echo '<td width=5% >'.$count++.'</td>';
           
           echo '<td width=5%>'.$array_info[$i]->stategifted.'</td>';
           echo '<td width=10%>'.(empty($array_info[$i]->gift_name) ? '-' : $array_info[$i]->gift_name).'</td>';
           echo '<td width=5%>'.$array_info[$i]->user_idx_receive.'</td>';
           echo '<td width=5%>'.$array_info[$i]->user_uid_receive.'</td>';
           echo '<td width=10%>'.$array_info[$i]->item_order_no.'</td>';
           echo '<td width=5%>'.$array_info[$i]->money.' Baht'.'</td>';
           echo '<td width=5%>'.$array_info[$i]->gift_gold_total.'</td>';
           echo '<td width=5%>'.number_format($total,2).'</td>';
           echo '<td width=5%>'.number_format($total_gold,2).'</td>';
           echo '<td width=10%>'.$array_info[$i]->ctime.'</td>';
           echo '</tr>';
        }
        // foreach($array_info as $new) :
            
        //     $color = ($count % 2 == 0) ? "tr_col" : "tr_col1";
        //     $total = $new->money * $new->gift_num;
            
        //     echo '<tr class="'.$color.'">';
        //    echo '<td >'.$count++.'</td>';
        //    echo '<td >'.$new->money.' Baht'.'</td>';
        //    echo '<td >'.$new->stategifted.'</td>';
        //    echo '<td >'.(empty($new->gift_name) ? '-' : $new->gift_name).'</td>';
        //    echo '<td >'.$new->user_idx_receive.'</td>';
        //    echo '<td >'.$new->user_uid_receive.'</td>';
        //    echo '<td >'.$new->item_order_no.'</td>';
        //    echo '<td >'.$total.'</td>';
        //    echo '<td >'.$new->ctime.'</td>';
        //    echo '</tr>';
        // endforeach
        
        ?>


        </table>
        <p>All total gold spend <?PHP echo number_format($total_gold_spend);?> Baht</p>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#back').click(function(){
            window.location.href = 'again.php'
        })
        $('#BTM').click(function(){
            x = document.getElementById('BTM')
            if(x.innerHTML == "Click to see table"){
                x.innerHTML = "Click to hide"
            }else{
                x.innerHTML = "Click to see table"
            }
            $('#table').slideToggle(500);
        })
    })
</script>