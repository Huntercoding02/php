    <?php
   
// $username_user =$_POST['username_user'];
// $password_user =$_POST['password_user'];
include_once('../day7/include/WebConfig.php');
$web = new mysql_class();

$web->Connect2Web();
if(empty($web->connect)){
    $response = array('ret_code'=>'501','msg'=>"Can not connect to data base","data"=>"");
    echo json_encode($response);
    // write_log(json_encode($response));
    exit;
}
$web->dbname(WebDB);


$username_user ="";
$password_user ="";
// $servername = "127.0.0.1";
// $username = "hunter";
// $password = "123456";

// $dbname = "full_ss5";

if(isset($_POST['username_user']) && $_POST['username_user']!=''){
    $username_user = $_POST['username_user'];
}
if(!$username_user){
    $response = array('ret_code'=>'202','msg'=>"Invalid data username","data"=>"");
    echo json_encode($response);
    // write_log(json_encode($response));
    exit;
}
$pattern_username = "/^[a-zA-Z0-9_]{8,16}$/";
    if (preg_match($pattern_username, $username_user)==FALSE) {
        $response = array('ret'=>'301','msg'=>'Invalid pattern username');
        echo json_encode($response);
        // write_log(json_encode($response));
        exit;
    }

if(isset($_POST['password_user']) && $_POST['password_user']!=''){
    $password_user = $_POST['password_user'];
}

if(!$password_user){
    $response = array('ret_code'=>'202','msg'=>"Invalid data password","data"=>"");
    echo json_encode($response);
    // write_log(json_encode($response));
    exit;
}
$pattern_password ="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
// $pattern_password = "/[\u0E00-\u0E7F]/";

    if (preg_match($pattern_password, $password_user)==FALSE) {
        $response = array('ret'=>'301','msg'=>'Invalid pattern password');
    
        echo json_encode($response);
        // write_log(json_encode($response));
        exit;
    }



// $conn = mysqli_connect( $servername, $username, $password );
// mysqli_select_db($conn,$dbname);

// // Check connection
// if ($conn->errno) {
//     $response = array('ret'=>'401','msg'=>"Connection failed: " . $conn->connect_error);
//         echo json_encode($response);
//         // write_log(json_encode($response));
//         exit;
// }

// @mysqli_query($conn,"set character_set_results=utf8mb4");
// @mysqli_query($conn,"set character_set_client=utf8mb4");
// @mysqli_query($conn,"set character_set_connection=utf8mb4");

$password_user = md5($password_user);

$sql_username = "SELECT username,PASSWORD,status FROM user_info WHERE username ='".$username_user."' AND PASSWORD = '".$password_user."' ";


// $result = mysqli_query($conn,$sql_username);
$array_result = $web->select($sql_username);

// $array_result = array();

// //ทำในกรณีที่ไอดีถูกแต่พาสผิด
// $sql_only_user = "SELECT username FROM user_info WHERE username = '".$username_user."';

// while($row = mysqli_fetch_object($result)) {
//     array_push($array_result, $row);
// }
// mysqli_close( $conn );
$web->closedb();


if(count($array_result)==1){
    if($array_result[0]->status =='1'){
        $response = array('ret'=>'101','msg'=>'Success');
        echo json_encode($response);
        session_start();
        $_SESSION['username'] = $array_result[0]->username;
        // write_log(json_encode($response));
        exit; 
    }else{
        $response = array('ret'=>'201','msg'=>'Unsuccess user not active');
        echo json_encode($response);
        // write_log(json_encode($response));
        exit; 
    }
}else{
    $response = array('ret'=>'201','msg'=>'Unsuccess user not found');
    echo json_encode($response);
    // write_log(json_encode($response));
    exit; 
}

// function write_log($log){
//     //Something to write to txt log
//     $date_log = date("Y-m-d H:i:s").PHP_EOL.
//     "IP :".get_client_ip().PHP_EOL;
//     "DATA : ".$log.PHP_EOL."-------------------------".PHP_EOL;
//     //Save string to log, use FILE_APPEND to append.
//     // file_put_contents('logs/log_'.date("Ymd").'.txt', $date_log, FILE_APPEND);
// }

?>


