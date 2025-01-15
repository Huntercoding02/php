<?PHP
$url_hunter = "https://together-gladly-airedale.ngrok-free.app/ss5/day3/file_process.php";
$url = "https://hawk-strong-abnormally.ngrok-free.app/ss5/day3/tableprocess.php";
$url_ford = "https://oyster-famous-lemming.ngrok-free.app/ford/day3/tableprocess.php";

$username = "testuser";
$password = "1254869754Qq!";
$con_password ="1254869754Qq!";
$name ="df";
$surname ="fd";
$email ="ddd@hdg.com";
$cid ="7897897897897";
$phone ="0812345678";
$address ="456TestAvenue";

                
$params_array_hunter = array(
    'username'=> $username,  
    'password' =>  $password ,
    'c_password'=> $con_password,
    'name'=> $name,
    'surname'=> $surname,
    'email'=> $email,
    'cid'=> $cid ,
    'phonenumber'=> $phone,
    'address'=> $address
);
// print_r($params_array);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url_hunter);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query($params_array_hunter));
// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);

echo"<pre>";
print_r($server_output);
?>