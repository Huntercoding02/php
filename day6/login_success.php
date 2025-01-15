<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    
</body>
</html>

<?php
session_start();
echo '<pre>';
print_r($_SESSION);
if(isset($_SESSION['username']) && $_SESSION['username']!=""){

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success</title>
</head>
<body>
    <?php
    if(isset($_SESSION['username']) && $_SESSION['username']!=""){
        echo "username: ".$_SESSION['username']; 
    }else{
        // header location: php
        // echo "<script>window.location.href='login.php'</script>";
    }
    ?>
    <a href="logout_form.php">Logout</a>
    <a href="login_form.php" name="btn_in" id="btn_in">Login</a>

    <?php
  
    // if (isset($_SESSION['username'])) {
    //     echo "<script>alert('Already loged in')</script>";
    // }
?>
<script>
//      $.ajax({
//                     type: "POST", //METHOD "GET","POST"
//                     url: "login.php", //File ที่ส่งค่าไปหา

//                 });
//                 $("#btn_in").click(function() {
//                     if(){
//                         alert('user login')
//                     }
                    
                    
                    
//                 return false;
// })
</script>

</body>
</html>