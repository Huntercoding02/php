<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
</head>
<body>
    Input : <input type="number" name="numb_1" id="numb_1">
    <button id= "btn" type=submit>send</button>
    <div id="result">
    Result Here
    </div>

    <script>
    $( document ).ready(function() {
    console.log( "ready!" );
    
    $("#btn").click(function(){
        var numb_1 = $("#numb_1").val();
        // alert(numb_1);
        if(numb_1==""){
            alert("Input is empty");
            $("#numb_1").focus();
            return false;
        }
        
        var data_1 = 1;
        var dataString = 'name_submit='+ numb_1; //ค่าที่จะส่งไปพร้อมตัวแปร
        $.ajax ({
                    type: "POST", //METHOD "GET","POST"
                    url: "test_loop.php", //File ที่ส่งค่าไปหา
                    data: dataString,
                    //cache: false,
                    success: function(data) {
                        console.log(data);
                    var data_red = JSON.parse(data)
                    //alert(data);
                    console.log(data_red.ret_code);
                    
                    if(data_red.ret_code == 201){
                        
                        result = data_red.data.pros + "=" + data_red.data.result;
                    console.log(result);
                    $("#result").html(result);
                    }else{
                        alert(data_red.msg)
                    }
                    // else{
                    //     alert("Unsuccess");
                    // }
                    } 
                });
      
    });
    }); 
    function sendData(){
        alert('HI')
        
    }
    </script>
</body>
</html>