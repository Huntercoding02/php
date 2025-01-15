<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        #container-all{

            width: 50%;
            margin: 0 auto;
            margin-top:150px ;
        }
        .input {
            padding-top: 5px;
        }
    </style>
    <?PHP
session_start();
                 if (isset($_SESSION['username'])) {
        echo "<script>alert('Already loged in')
        window.location.href='login_success.php'</script>";
        
    }
?>
</head>

<body>


        <div id="container-all" >
    <div class="d-flex  justify-content-center" >
    
        <div class="form-group">
            <h2>Login</h2>
        </div>
        </div>
        
        <div class="d-flex  justify-content-center align-items-center">
        <div class="form-group">
            <label for="username" class="form-label">Username : </label>
            <input type="text" class="form-control" name='username' id='username'>
        </div>
        </div>
        <div class="d-flex  justify-content-center">
        <div class="form-group">
            <label for="password" class="form-label">Password :</label>
            <input type="password" name='password' id='password' class="form-control">
        </div>
        </div>

        <div class="d-flex  justify-content-center">
        <div class="form-group">
        <button type="submit" class="btn btn-primary" id="btn_login">Login</button>
        <button type="submit" class="btn btn-primary" id="btn_register">Register</button>
        </div>
    </div>
    <div class="form-group">
    
        <div id="wroning" role="alert" class="d-flex  justify-content-center alert">&nbsp;</div>
       
        
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            console.log("ready!");

            $("#btn_login").click(function() {
                var username_user = $("#username").val();
                var password_user = $("#password").val();
                var data_1 = 1;
                var dataString = 'username_user=' + username_user + '&password_user=' + password_user;
                $("#wroning").removeClass("alert-danger alert-success");

                if (username_user == "") {
                    console.log("Please enter username");

                    $("#wroning").fadeIn();
                    $("#wroning").addClass("alert-danger").html("Please enter username");
                    $("#username").focus();
                    // $("#wroning").fadeOut(5000);
                    return false;
                }
                if (username_user.length < 8 || username_user.length > 16) {

                    $("#wroning").fadeIn();
                    $("#wroning").addClass("alert-danger").html("Please enter username not less than 8 but not more than 16");
                    $("#username").focus();
                    // $("#wroning").fadeOut(5000);
                    return false;
                }
                if (!/^[a-z0-9]+$/.test(username_user)) {
                    $("#wroning").fadeIn();
                    $("#wroning").addClass("alert-danger").html("Pattern username is wrong!");
                    $("#username").focus();
                    return false;
                }
                if (password_user == "") {

                    $("#wroning").fadeIn();
                    $("#wroning").addClass("alert-danger").html("Please enter password");
                    $("#password").focus();
                    // $("#wroning").fadeOut(5000);
                    return false;
                }
                if (password_user.length < 8 || password_user.length > 16) {
                    $("#wroning").fadeIn();
                    $("#wroning").addClass("alert-danger").html("Please enter password not less than 8 but not more than 16");
                    $("#password").focus();
                    // $("#wroning").fadeOut(5000);
                    return false;
                }
                if (username_user == password_user) {
                    $("#wroning").fadeIn();
                    $("#wroning").addClass("alert-danger").html("username can not same as password");
                    $("#password").focus();
                    // $("#wroning").fadeOut(5000);
                    return false;
                }
                console.log("JIK");

                //"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/" "/[\u0E00-\u0E7F]/"
                if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password_user)) {
                    $("#wroning").fadeIn();
                    $("#wroning").addClass("alert-danger").html("Pattern password is wrong!. Password must contain 1 capital character number and special character");
                    $("#password").focus();
                    return false;
                }


                // document.getElementById("username").value
                // document.getElementById("password").value
                console.log(dataString);

                $.ajax({
                    type: "POST", //METHOD "GET","POST"
                    url: "login.php", //File ที่ส่งค่าไปหา
                    data: dataString,
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        var data_red = JSON.parse(data)
                        console.log(data_red.ret);
                        console.log(data_red);
                        if (data_red.ret == '101') {
                            $("#wroning").fadeIn();
                            $("#wroning").addClass("alert-success").html("Login Success");
                            window.location.href ="login_success.php";
                        } else {
                            $("#wroning").fadeIn();
                            $("#wroning").addClass("alert-danger").html("Not found ID");
                        }
                       
                        $("#wroning").fadeOut(5000);
                      
                        // console.log(typeof(data_red));
                        // console.log(data_red.ret,"JIK");
                        // if(data_red.ret){
                        //     window.location.href="login.php"
                        // }
                    }


                    // var data_red = JSON.parse(data)
                    // // //alert(data);
                    // // console.log(data_red.ret_code);

                    // if(data_red.ret == 101){
                    //    window.location.href="../day5/table_show.php"
                    //     // $("#c_password").focus();
                    // }else{
                    //     // // console.log("hi",data_red.msg);
                    //     // $("#wroning").fadeIn();
                    //     // $("#wroning").html(data_red.msg);
                    // }


                    // //     result = data_red.data.pros + "=" + data_red.data.result;
                    // // console.log(result);
                    // // $("#result").html(result);
                    // // }else{
                    // //     alert(data_red.msg)
                    // // }
                    // // else{
                    // //     alert("Unsuccess");
                    // }
                    // } 
                });
                return false

            });
            $("#btn_register").click(function() {

                window.location.href = "../day3/table.php";
                return false;
            });

        });
    </script>
</body>

</html>