<?PHP
$url_hunter = "https://together-gladly-airedale.ngrok-free.app/ss5/day3/file_process.php";
$url_dai = "https://hawk-strong-abnormally.ngrok-free.app/ss5/day3/tableprocess.php";
$url_ford = "https://oyster-famous-lemming.ngrok-free.app/ford/day3/tableprocess.php";



$username = "";
$password = "";
$con_password ="";
$name ="";
$surname ="";
$email ="";
$cid ="";
$phone ="";
$address ="";

                
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

$params_array_ford = $_POST;
// array(
//     'username'=> $username,  
//     'password' =>  $password ,
//     'con_password'=> $con_password,
//     'email'=> $email,
//     'fname'=> $name,
//     'lname'=> $surname,
//     'c_id'=> $cid ,
//     'phone'=> $phone,
//     'address'=> $address
// );
$params_array_dai = array(
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

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url_ford);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query($params_array_ford));
// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);

echo"<pre>";
print_r($server_output);
// ?>