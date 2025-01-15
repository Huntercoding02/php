<?PHP
$username ="";
$password ="";
$c_password ="";
$name ="";
$surname ="";
$email ="";
$cid ="";
$phonenumber ="";
$address ="";
$selected ="";


if (isset($_POST['selected']) && $_POST['selected'] != '') {
    $selected = $_POST['selected'];
}
if (isset($_POST['username']) && $_POST['username'] != '') {
    $username = $_POST['username'];
}
if (!$username) {
    $response = array('ret_code' => '202', 'msg' => "Invalid data username", "data" => "");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}
$pattern_username = "/^[a-zA-Z0-9_]{8,16}$/";
if (preg_match($pattern_username, $username) == FALSE) {
    $response = array('ret' => '301', 'msg' => 'Invalid pattern username');
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}


if (isset($_POST['password']) && $_POST['password'] != '') {
    $password = $_POST['password'];
}
if (!$password) {
    $response = array('ret_code' => '202', 'msg' => "Invalid data password", "data" => "");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}
$pattern_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
// $pattern_password = "/[\u0E00-\u0E7F]/";

if (preg_match($pattern_password, $password) == FALSE) {
    $response = array('ret' => '301', 'msg' => 'Invalid pattern password');

    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

if (isset($_POST['c_password']) && $_POST['c_password'] != '') {
    $c_password = $_POST['c_password'];
}
if (!$c_password) {
    $response = array('ret_code' => '202', 'msg' => "Invalid data confirm password", "data" => "");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}
$pattern_c_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
// $pattern_c_password = "/[\u0E00-\u0E7F]/";
if (preg_match($pattern_c_password, $c_password) == FALSE) {
    $response = array('ret' => '301', 'msg' => 'Invalid pattern Confirm-password');
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

if ($username == $password) {
    $response = array('ret_code' => '202', 'msg' => "Invalid password and user can not be the same", "data" => "");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

if ($password != $c_password) {
    $response = array('ret_code' => '202', 'msg' => "Invalid password and Confirm-password mismatching", "data" => "");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}
if (isset($_POST['name']) && $_POST['name'] != '') {
    $name = $_POST['name'];
}
if (!$name) {
    $response = array('ret_code' => '202', 'msg' => "Invalid data name", "data" => "");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

$pattern_name = "/^[\p{L}\p{M}]+$/u";
if (preg_match($pattern_name, $name) == FALSE) {
    $response = array('ret_code' => '302', 'msg' => "Pattern name is wrong!");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

if (isset($_POST['lastname']) && $_POST['lastname'] != '') {
    $surname = $_POST['lastname'];
}
if (!$surname) {
    $response = array('ret_code' => '202', 'msg' => "Invalid data surname", "data" => "");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

$pattern_surname = "/^[\p{L}\p{M}]+$/u";
if (preg_match($pattern_surname, $surname) == FALSE) {
    $response = array('ret' => '303', 'msg' => '"Pattern surname is wrong!"');
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

if (isset($_POST['email']) && $_POST['email'] != '') {
    $email = $_POST['email'];
}
if (!$email) {
    $response = array('ret_code' => '202', 'msg' => "Invalid data email", "data" => "");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

$pattern_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
if (preg_match($pattern_email, $email) == FALSE) {
    $response = array('ret' => '304', 'msg' => "Pattern email is wrong!");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}

if (isset($_POST['cid']) && $_POST['cid'] != '') {
    $cid = $_POST['cid'];
}

if (!$cid || !preg_match('/^\d{13}$/', $cid)) {
    $response = array('ret_code' => '202', 'msg' => "Invalid data Citizin ID", "data" => "");
    echo json_encode($response);
    write_log(json_encode($response));
    exit;
}


if (isset($_POST['phone']) && $_POST['phone'] != '') {
    $phonenumber = $_POST['phone'];
}
// if(!$phonenumber){
//     $response = array('ret_code'=>'202','msg'=>"Invalid data","data"=>"");
//     echo json_encode($response);
//     exit;
// }
if (isset($_POST['address']) && $_POST['address'] != '') {
    $address = $_POST['address'];
    // $_POST['address'];

}


$switch_1 = $selected;


if ($switch_1 == '1') {
    // echo 'huntedr';
    // exit;
//1 dai
    $params_array_dai = array(
        'username' => $username,
        'password' =>  $password,
        'c_password' => $c_password,
        'name' => $name,
        'lastname' => $surname,
        'email' => $email,
        'cid' => $cid,
        'phonenumber' => $phonenumber,
        'address' => $address
    );

    $url_dai = "https://hawk-strong-abnormally.ngrok-free.app/ss5/day3/tableprocess.php";


    $result = cuel($url_dai, $params_array_dai);
    // $redirect_dai = "https://hawk-strong-abnormally.ngrok-free.app/ss5/day3/tableshow.php";

    $data_res = json_decode($result);
    
    if (isset($data_res->ret_code) && $data_res->ret_code == '101') {
        $response = array('ret' => '101', 'msg' => "success",
        'location'=> "https://hawk-strong-abnormally.ngrok-free.app/ss5/day3/tableshow.php");
     
        echo json_encode($response);
        exit;
    } else {
       
        $msg = "Unsuccess";
       
        if (isset($data_res->msg)) {
            $msg = $data_res->msg;
        }
        $response = array('ret' => '801', 'msg' => $msg);
        echo json_encode($response);

    }
}else if($switch_1 == '0') { 
    // echo 'huntefr';
    // exit;
//2 ford
    $params_array_ford = array(
    'username' => $username,
    'password' =>  $password,
    'con_password' => $c_password,
    'fname' => $name,
    'lname' => $surname,
    'email' => $email,
    'c_id' => $cid,
    'phone' => $phonenumber,
    'address' => $address
);


$url_ford = "https://oyster-famous-lemming.ngrok-free.app/ford/day3/tableprocess.php";

$result = cuel($url_ford, $params_array_ford);

    
$data_res = json_decode($result);

   
if(isset($data_res->status) && $data_res->status == '101') {
    $response = array('ret' => '101', 'msg' => "success",
    'location'=> "https://oyster-famous-lemming.ngrok-free.app/ford/Day4/connet.php");
    echo json_encode($response);
    
    exit;

} else {
    
    $msg = "Unsuccess";
    if (isset($data_res->msg)) {
        $msg = $data_res->msg;
    }
    $response = array('ret' => '10001', 'msg' => $msg);
    echo json_encode($response);
    
    exit;
}

    
}else if($switch_1 == '2'){
    // echo 'hunter';
    // exit;
    //3 hunter
    $params_array_hunter = array(
        'username' => $username,
        'password' =>  $password,
        'c_password' => $c_password,
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
        'cid' => $cid,
        'phonenumber' => $phonenumber,
        'address' => $address
    );
    
    
    $url_hunter = "https://together-gladly-airedale.ngrok-free.app/ss5/day3/file_process.php";
    
    $result = cuel($url_hunter, $params_array_hunter);
    
        
    $data_res = json_decode($result);
    
       
    if(isset($data_res->ret) && $data_res->ret == '101') {
        $response = array('ret' => '101', 'msg' => "success",
        'location'=> "https://together-gladly-airedale.ngrok-free.app/ss5/day5/table_show.php");
        echo json_encode($response);
        
        exit;
    
    } else {
        
        if (isset($data_res->msg)) {
            $msg = $data_res->msg;
        }
        $response = array('ret' => '901', 'msg' => $msg);
        echo json_encode($response);
        
        exit;
    }
}


// $params_array_hunter = array(
//     'username'=> $username,  
//     'password' =>  $password ,
//     'c_password'=> $con_password,
//     'name'=> $name,
//     'surname'=> $surname,
//     'email'=> $email,
//     'cid'=> $cid ,
//     'phonenumber'=> $phone,
//     'address'=> $address
// );


function cuel($url, $setup)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt(
        $ch,
        CURLOPT_POSTFIELDS,
        http_build_query($setup)
    );
    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    return $server_output;
}


function write_log($log){
    //Something to write to txt log
    $date_log = date("Y-m-d H:i:s").PHP_EOL.
    "IP :".get_client_ip().PHP_EOL;
    "DATA : ".$log.PHP_EOL."-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('day3/logs/log_'.date("Ymd").'.txt', $date_log, FILE_APPEND);
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