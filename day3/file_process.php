<?php

//หน้า form ของเราที่ต้องรับค่า

include_once('../day7/include/WebConfig.php');
$web = new mysql_class();
$web->Connect2Web();

if(empty($web->connect)){
    echo $web->connect;
}
$web->dbname(WebDB);
// echo json_encode($_POST);
$username ="";
$password ="";
$c_password ="";
$name ="";
$surname ="";
$email ="";
$cid ="";
$phonenumber ="";
$address ="";
$my_token = "hunhunhun";
    write_log(json_encode($_POST));
    $token_cur = isset($_POST['date'])?($_POST['date']):"";
    $token_user = isset($_POST['user'])?($_POST['user']):"";
    $token_username = isset($_POST['username'])?($_POST['username']):"";
    $token_password = isset($_POST['password'])?($_POST['password']):"";
    $token_con_password = isset($_POST['c_password'])?($_POST['c_password']):"";
    $token_name = isset($_POST['name'])?($_POST['name']):"";
    $token_surname = isset($_POST['surname'])?($_POST['surname']):"";
    $token_email = isset($_POST['email'])?($_POST['email']):"";
    $token_cid = isset($_POST['cid'])?($_POST['cid']):"";
    $token_phonenumber = isset($_POST['phonenumber'])?($_POST['phonenumber']):"";
    $token_address = isset($_POST['address'])?($_POST['address']):"";
   

    $token = md5($token_username . $token_password . $token_con_password . $token_email . $token_name . $token_surname . $token_cid . $token_phonenumber . $token_address . $token_cur . $my_token);


// $p_tokenex = md5($_POST['username'] . $_POST['password'] . $_POST['con_password'] . $_POST['email'] . $_POST['fname'] . $_POST['lname'] . $_POST['c_id'] . $_POST['phone'] . $_POST['address'] . $_POST['date'] . $my_token);


if($token_user != $token){
    $response = array('ret_code'=>'002','msg'=>"Wrong User");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

$data_diff = strtotime(date("Y-m-d H:i:s")) - $token_cur;
write_log($data_diff);
write_log($token_cur);
write_log(strtotime(date("Y-m-d H:i:s")));
if($data_diff>=300 || $data_diff<(-300)){
    
    $response = array('ret_code'=>'003','msg'=>"User expired");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}


// $servername = "127.0.0.1";
// $username_user = "hunter";
// $password_user = "123456";
// $dbname = "full_ss5";
// $username_user = $_POST['username_user'];

// $cid = $_POST['cid'];
// $email =$_POST['email'];
// $name =$_POST['name'];
// $surname =$_POST['surname'];
// $address =$_POST['address'];
// $phonenumber =$_POST['phonenumber'];

if(isset($_POST['username']) && $_POST['username']!=''){
    $username = $_POST['username'];
    
}
if(!$username){
    $response = array('ret_code'=>'202','msg'=>"Invalid data username","data"=>"");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}
$pattern_username = "/^[a-zA-Z0-9_]{8,16}$/";
    if (preg_match($pattern_username, $username)==FALSE) {
        $response = array('ret'=>'301','msg'=>'Invalid pattern username');
        echo json_encode($response);
        write_log(json_encode($response));
        exit;
    }


if(isset($_POST['password']) && $_POST['password']!=''){
    $password = $_POST['password'];
    
}
if(!$password){
    $response = array('ret_code'=>'202','msg'=>"Invalid data password","data"=>"");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}
$pattern_password ="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
// $pattern_password = "/[\u0E00-\u0E7F]/";

    if (preg_match($pattern_password, $password)==FALSE) {
        $response = array('ret'=>'301','msg'=>'Invalid pattern password');
    
        echo json_encode($response);
        write_log(json_encode($response));
        exit;
    }

if(isset($_POST['c_password']) && $_POST['c_password']!=''){
    $c_password = $_POST['c_password'];
    
}
if(!$c_password){
    $response = array('ret_code'=>'202','msg'=>"Invalid data confirm password","data"=>"");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}
$pattern_c_password ="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
// $pattern_c_password = "/[\u0E00-\u0E7F]/";
    if (preg_match($pattern_c_password , $c_password)==FALSE) {
        $response = array('ret'=>'301','msg'=>'Invalid pattern Confirm-password');
        echo json_encode($response);
        write_log(json_encode($response));
        exit;
    }

    if($username==$password){
        $response = array('ret_code'=>'202','msg'=>"Invalid password and user can not be the same","data"=>"");
        echo json_encode($response);
        write_log(json_encode($response));
        exit;
    }

if($password!=$c_password){
    $response = array('ret_code'=>'202','msg'=>"Invalid password and Confirm-password mismatching","data"=>"");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}
if(isset($_POST['name']) && $_POST['name']!=''){
    $name = $_POST['name'];
    
}
if(!$name){
    $response = array('ret_code'=>'202','msg'=>"Invalid data name","data"=>"");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

$pattern_name = "/^[\p{L}\p{M}]+$/u";
    if (preg_match($pattern_name , $name)==FALSE) {
        $response = array('ret_code'=>'302','msg'=>"Pattern name is wrong!");
        echo json_encode($response);
        write_log(json_encode($response));
        exit;
    }

if(isset($_POST['surname']) && $_POST['surname']!=''){
    $surname = $_POST['surname'];
    
}
if(!$surname){
    $response = array('ret_code'=>'202','msg'=>"Invalid data surname","data"=>"");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

$pattern_surname = "/^[\p{L}\p{M}]+$/u";
    if (preg_match($pattern_surname , $surname)==FALSE) {
        $response = array('ret'=>'303','msg'=>'"Pattern surname is wrong!"');
        echo json_encode($response);
        write_log(json_encode($response));
        exit;
    }

if(isset($_POST['email']) && $_POST['email']!=''){
    $email = $_POST['email'];
    
}
if(!$email){
    $response = array('ret_code'=>'202','msg'=>"Invalid data email","data"=>"");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

$pattern_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (preg_match($pattern_email , $email)==FALSE) {
        $response = array('ret'=>'304','msg'=>"Pattern email is wrong!");
        echo json_encode($response);
        write_log(json_encode($response));
        exit;
    }

if(isset($_POST['cid']) && $_POST['cid']!=''){
    $cid = $_POST['cid'];
    
}

if(!$cid || !preg_match('/^\d{13}$/', $cid)){
    $response = array('ret_code'=>'202','msg'=>"Invalid data Citizin ID","data"=>"");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}


if(isset($_POST['phonenumber']) && $_POST['phonenumber']!=''){
    $phonenumber = $web->escape_string($_POST['phonenumber']); 
    
}
// if(!$phonenumber){
//     $response = array('ret_code'=>'202','msg'=>"Invalid data","data"=>"");
//     echo json_encode($response);
//     exit;
// }
if(isset($_POST['address']) && $_POST['address']!=''){
    $address = $web->escape_string($_POST['address']); 
    // $_POST['address'];
    
}
$password =md5($password);
// if(!$address){
//     $response = array('ret_code'=>'202','msg'=>"Invalid data","data"=>"");
//     echo json_encode($response);
//     exit;
// }
// Create connection
// $conn = mysqli_connect( $servername, $username_user , $password_user  );
// mysqli_select_db($conn,$dbname);
// ($conn->errno);
// Check connection
// if ($conn->errno) {
//     die("Connection failed: " . $conn->connect_error);
// }
// @mysqli_query($conn,"set character_set_results=utf8mb4");
// @mysqli_query($conn,"set character_set_client=utf8mb4");
// @mysqli_query($conn,"set character_set_connection=utf8mb4");
// $sql = "SELECT * FROM user_info;";
// $result = mysqli_query($conn,$sql);
$sql = "INSERT INTO user_info
(`username`, `password`, `citizin_id`, `email`, `name`, `surname`, `address`, `phone_number`) 
VALUES ('".$username."', '".$password."', '".$cid."', '".$email."', '".$name."', '".$surname."',' ".$address."', '".$phonenumber."');
";
// $result_insert = mysqli_query($conn,$sql);
$result_insert = $web->execute($sql);

// $sql_citizin =  "SELECT username FROM user_info WHERE citizin ='{$cid}' LIMIT 1"; //sql check for 
    // $result = $web->select($sone)
    // if (count(sql_citizin) >0){
    //     $response =array('ret'=>'101','msg'=>"success","data"=>$_POST);
    //     write_log(json_encode($response));
    //     echo json_encode($response);
    //     exit;
    // }

$sql_check = "SELECT FROM user_info FROM user_info WHERE username = '$username' LIMIT 1 ";
// $array_result = array();

// $sql_citizin =  "SELECT citizen_id FROM user_info WHERE citizin ='{$cid}' LIMIT 1"; //sql check for 
//     $result = $web->select($sql_citizin);
//     if(count($sql_citizin>0)){
//         $response =array('ret'=>'101','msg'=>"success","data"=>$_POST);
//         write_log(json_encode($response));
//         echo json_encode($response);
//         exit;
//     }

//     $sql_username =  "SELECT citizen_id FROM user_info WHERE username ='{$username}' LIMIT 1"; //sql check for 
//     $result = $web->select($sql_username);
//     if(count($sql_username>0)){
//         $response =array('ret'=>'101','msg'=>"success","data"=>$_POST);
//         write_log(json_encode($response));
//         echo json_encode($response);
//         exit;
//     }

//     $sql_email =  "SELECT email FROM user_info WHERE email ='{$email}' LIMIT 1"; //sql check for 
//     $result = $web->select($sql_email);
//     if(count($sql_email>0)){
//         $response =array('ret'=>'101','msg'=>"success","data"=>$_POST);
//         write_log(json_encode($response));
//         echo json_encode($response);
//         exit;
//     }

if($result_insert){
    $response =array('ret'=>'101','msg'=>"success","data"=>$_POST,'location'=> "https://together-gladly-airedale.ngrok-free.app/ss5/day5/table_show.php");
    write_log(json_encode($response));
    echo json_encode($response);
    exit;

}else{
    $response = array('ret'=>'301','msg'=>"Unsuccess  dupli","sql"=>$sql);
    // $sql_citizin =  "SELECT username FROM user_info WHERE citizin ='{$cid}' LIMIT 1"; //sql check for 
    // $result = $web->select($sone)
    // if (count(sql_citizin) >0){
    //     $response =array('ret'=>'101','msg'=>"success","data"=>$_POST);
    //     write_log(json_encode($response));
    //     echo json_encode($response);
    //     exit;
    // }
    //response json
    //exit
    //$sql_password =  SELECT username FROM user_info WHERE username ='{$username}' LIMIT 1; sql check for 
    //$result = $web->select($sone)
    //if count >0
    //response json
    //exit
    //$sql_email =  SELECT username FROM user_info WHERE username ='{$username}' LIMIT 1; sql check for 
    //$result = $web->select($sone)
    //if count >0
    //response json
    //exit
        echo json_encode($response);
        write_log(json_encode($response));
 
}
// while($row = mysqli_fetch_object($result)) {
//     array_push($array_result, $row);
// }
// if(count($array_result)>0){
//     for($i=0;$i<count($array_result);$i++){
//         echo "id =".$array_result[$i]->id;
//         echo "|username =".$array_result[$i]->username;
//         echo "<hr>";
//     }
// }
$web->closedb();
// mysqli_close( $conn );



function write_log($log){
    //Something to write to txt log
    $date_log = date("Y-m-d H:i:s").PHP_EOL.
    "IP :".get_client_ip().PHP_EOL.
    "DATA : ".$log.PHP_EOL."-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('logs/log_x'.date("Ymd").'.txt', $date_log, FILE_APPEND);
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

?>

