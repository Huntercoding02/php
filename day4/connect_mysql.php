<?php
// // phpinfo();
// // exit;

// $servername = "127.0.0.1";
// $username = "hunter";
// $password = "123456";
// $dbname = "full_ss5";


// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT * FROM user_info;";
// $result = $conn->query($sql);
// // echo "<pre>";
// // print_r($result);
// // print_r($result->fetch_assoc());

// // print_r($result->fetch_array());

// // $sql = "SELECT id, firstname, lastname FROM MyGuests";
// // $result = mysqli_query($conn, $sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Username: " . $row["username"]. "Password " . $row["password"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }

// mysqli_close($conn);

//----------------------------//
$servername = "127.0.0.1";
$username = "hunter";
$password = "123456";
$dbname = "full_ss5";

$password_user =md5($password);
$username_user = $_POST['username_user'];
$cid = $_POST['cid'];
$email =$_POST['email'];
$name =$_POST['name'];
$surname =$_POST['surname'];
$address =$_POST['address'];
$phonenumber =$_POST['phonenumber'];

// Create connection
$conn = mysqli_connect( $servername, $username, $password );
mysqli_select_db($conn,$dbname);
// print_r($conn->errno);
// Check connection
if ($conn->errno) {
    die("Connection failed: " . $conn->connect_error);
}
@mysqli_query($conn,"set character_set_results=utf8mb4");
@mysqli_query($conn,"set character_set_client=utf8mb4");
@mysqli_query($conn,"set character_set_connection=utf8mb4");
// $sql = "SELECT * FROM user_info;";
// $result = mysqli_query($conn,$sql);
$sql = "INSERT INTO user_info
(`username`, `password`, `citizin_id`, `email`, `name`, `surname`, `address`, `phone_number`) 
VALUES ('$username_user', '$password_user', '$cid', '$email', '$name', '$surname',' $address', '$phonenumber');
";
$result_insert = mysqli_query($conn,$sql);

$array_result = array();
if($result_insert){
  echo "Success";
}else{
  echo "Unsuccess".mysqli_error($conn);
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

mysqli_close( $conn );
?>

<?php
    // $servername = "127.0.0.1";
    // $username = "root";
    // $password = "xxxx";
 
    // $dbname = "full_ss5";
    // // Create connection
    // $conn = mysqli_connect( $servername, $username, $password );
    // mysqli_select_db($conn,$dbname);
    // // print_r($conn->errno);
    // // Check connection
    // if ($conn->errno) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // @mysqli_query($conn,"set character_set_results=utf8mb4");
    // @mysqli_query($conn,"set character_set_client=utf8mb4");
    // @mysqli_query($conn,"set character_set_connection=utf8mb4");
    // $sql = "SELECT * FROM user_info;";
    // $result = mysqli_query($conn,$sql);

    // $array_result = array();
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
    
    // mysqli_close( $conn );
?>