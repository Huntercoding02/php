<?php
// echo date('Y-m-d H:i:s');
include_once('../day7/include/WebConfig.php');


$web = new mysql_class();


// $servername = "127.0.0.1";
// $username = "hunter";
// $password = "123456";
// $password_user =md5($password);
// $dbname = "full_ss5";

// Create connection


$web->Connect2Web();

if (empty($web->connect)) {
    echo $web->connect;
    exit;
}

$web->dbname(WebDB);
// $conn = mysqli_connect( $servername, $username, $password );
// mysqli_select_db($conn,$dbname);
// print_r($conn->errno);


// Check connection
// if ($conn->errno) {
//     die("Connection failed: " . $conn->connect_error);
// }

// @mysqli_query($conn,"set character_set_results=utf8mb4");
// @mysqli_query($conn,"set character_set_client=utf8mb4");
// @mysqli_query($conn,"set character_set_connection=utf8mb4");


if (isset($_POST['button_del'])) {

    $var = $_POST['id_show'];
    if (isset($var)) {
        $del_sql = "DELETE FROM user_info WHERE id = $var";


        $return = $web->execute($del_sql);
        if ($return) {
            echo '<script>
        window.location.href ="table_show.php"
        </script>';
        } else {
            echo 'Can not delete data';
        }

        // $result = mysqli_query($conn,$del_sql);
        //     print_r($del_sql);
        // echo '<script>
        // window.location.href ="table_show.php"
        // </script>';

    }
}

if (isset($_POST['button_up'])) {
    // print_r($_POST['phonenumber']);
    // print_r($_POST['id_show']);
    $phone = $_POST['phonenumber'];
    $var = $_POST['id_show'];
    if (isset($var)) {
        $up_sql = "UPDATE user_info 
            SET phone_number = '$phone'
            WHERE id = $var";

        $return = $web->execute($up_sql);
        if ($return) {
            echo '<script>
window.location.href ="table_show.php"
</script>';
        } else {
            echo 'Can not update data';
        }
        // $result = mysqli_query($conn, $up_sql);
        // print_r($up_sql);
        // echo '<script>
        // window.location.href ="table_show.php"
        // </script>';
    }
}


// $sql = "SELECT * FROM user_info;";
// $result = mysqli_query($conn,$sql);
$sql = "SELECT * FROM user_info WHERE status in('0','1') ORDER BY createtime DESC";
// $result = mysqli_query($conn, $sql);
$array_result = $web->select($sql);



// $array_result = array();
// if($result_insert){
//   echo "Success";
// }else{
//   echo "Unsuccess".mysqli_error($conn);
// }
// while ($row = mysqli_fetch_object($result)) {
//     array_push($array_result, $row);
// }

// echo "<pre>";
// print_r($array_result);
// if(count($array_result)>0){
//     for($i=0;$i<count($array_result);$i++){
//         echo "id =".$array_result[$i]->id;
//         echo "|username =".$array_result[$i]->username;
//         echo "<hr>";
//     }
// }


$web->closedb();


// mysqli_close( $conn );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show table user</title>
    <link rel="stylesheet" href="../day3/color.css" />
    <style>
        th {
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <table id="table_1" style="border: 1px solid black;">
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Name Surname</th>
            <th>Citizin Id</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Address</th>
            <th>Create Time</th>
            <th>Last Update</th>
            <th>Status</th>
            <th>Function</th>
        </tr>

        <?PHP

        if (count($array_result) > 0) {


            $tr_row = "";
            for ($i = 0; $i < count($array_result); $i++) {
                $status = "De active";
                $createtime = $array_result[$i]->createtime;
                $updatetime = $array_result[$i]->updatetime;
                $date_1 = date_create("$createtime");
                $year = date_format($date_1, "dmY");
                $time = date_format($date_1, "h:i:s");
                $date = date_format($date_1, "d");
                $month = date_format($date_1, "m");
                $year = date_format($date_1, "Y") + 543;
                $day = substr($date, 0, 2);
                $hour = substr($date, 8, 2);
                $min = substr($date, 10, 2);
                $sec = substr($date, 12, 2);

                $month_cal = cal($month);

                $datetime = $day . " " . $month_cal . " " . $year . " " . $time;

                // $day= substr($date)
                // echo $date;
                if ($array_result[$i]->status == '1') {
                    $status = 'Active';
                }

                $tr_row .= "
                <form method='POST'>
                <tr>
            <td>" . $i + '1' . "</td>
            <td>" . $array_result[$i]->username . "</td>
            <td>" . $array_result[$i]->name . " " . $array_result[$i]->surname . "</td>
            <td>" . $array_result[$i]->citizin_id . "</td>
            <td>" . $array_result[$i]->email . "</td>
            <td><input name='phonenumber'  value='" . $array_result[$i]->phone_number . "'></input></td>
            <td>" . $array_result[$i]->address . "</td>
            <td>" . $datetime . "</td>
            <td>" . $updatetime . "</td>
            <td>" . $status . "</td>
            
           
            <td><input type='hidden' name='id_show' value='" . $array_result[$i]->id . "' />
                <button type='submit' name='button_del'  id='btn_del'>Delete</button><br>

                <button type='submit' name='button_up'  id='btn_up'>Update</button></td>
                
            </form>
            </tr>";
            }
        } else {
            $tr_row .= "<tr><td colspan ='9'>..No Data..</td></tr>";
        }
        echo $tr_row;

        function cal($y)
        {
            $month = 0;

            if (strlen($y) > 2) {
                return false;
            }
            if (strlen($y) == 1) {
                $month =  '0' . $y;
            }
            if ($y == '01') {
                $month = 'ม.ค.';
            } else if ($y == '02') {
                $month = 'ก.ภ.';
            } else if ($y == '03') {
                $month = 'มี.ค.';
            } else if ($y == '04') {
                $month = 'เม.ษ.';
            } else if ($y == '05') {
                $month = 'พ.ค.';
            } else if ($y == '06') {
                $month = 'มิ.ย.';
            } else if ($y == '07') {
                $month = 'ก.ค.';
            } else if ($y == '08') {
                $month = 'ส.ค.';
            } else if ($y == '09') {
                $month = 'ก.ย.';
            } else if ($y == '10') {
                $month = 'ต.ค.';
            } else if ($y == '11') {
                $month = 'พ.ย.';
            } else if ($y == '12') {
                $month = 'ธ.ค.';
            }

            return $month;
        }
        // echo cal();

        ?>
    </table>
    <button type="button" id="btn" onclick="window.location.href= '../day3/table.php'">Go to Register</button>
</body>

</html>