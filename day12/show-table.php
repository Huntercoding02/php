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
    <div>
    <input type="radio" id="gift" name="sql" value="2">
        <label for="gift">Gift</label><br>
        <input type="radio" id="twin" name="sql" value="1">
        <label for="twin">Twin</label><br>
        <input type="radio" id="gacha" name="sql" value="0">
        <label for="gacha">Gacha</label><br><br><br>

    </div>
    <button id="back" style="margin:0px auto;"><-----Back to again page</button>
    <div id="table" style="display: none;">
        <h1 style="text-align: center;">Show info</h1>
        <table >
        <?PHP
        
        require_once('data.php');
        require_once('data_store.php');
        require_once('data_gacha.php');
        // echo count($array_info);
    //     $PageEach =10;
    // # แบ่งหน้า
    // $pages = ceil(count($array_info) / $PageEach);
    // echo $pages;
    # ช่วงหน้า
    // $r = (($p * $PageEach) - $PageEach); 
    $switch =0;
    if($switch ==0){
        // print_r($array_info[0]->photo);
        
        echo '<th>No.</th> <th>gift_name</th> <th>stategifted </th><th>VJ</th><th>user_uid</th><th>receive_type</th><th>Money</th><th>Total</th><th> Gold</th><th>Total gold</th><th>Time</th><th>photo</th>';
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
           echo '<td width=10%><img src="'.$array_info[$i]->photo.'" alt=""></td>';
           echo '</tr>';
        }
       echo '<p>All total gold spend <?PHP echo number_format('.$total_gold_spend.');?> Baht</p>';
    }else if($switch ==1){
        echo '<th>No.</th><th>user_name</th><th>user_logo</th><th>user_id</th><th>user_id01</th>';
        // print_r($users[0]['user_name']);
        // echo count($users);
        for($i=0;$i<count($users);$i++){
            echo '<tr>
            <td>'.($i+1).'</td>
            <td>'.$users[$i]['user_name'].'</td>
            <td>'.$users[$i]['user_logo'].'</td>
            <td>'.$users[$i]['user_id'].'</td>
            <td>'.$users[$i]['user_id01'].'</td>
            </tr>';
        }
    }else if($switch ==2){
        echo '2';
    }
     
        ?>


        </table>
        
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#back').click(function(){
            window.location.href = 'table.php'
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