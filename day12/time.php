<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เปลี่ยนเวลาจากวิ</title>
</head>
<body>
    <form method="GET">
   ใส่จำนวนตัวเลขที่จะแปลงค่า : <input type="number" name="num" placeholder="ใส่เลขเป็นวิ"></input>
    <button type="submit" name="btn" value="sub">แปลงค่า</button>
   </form>
</body>
</html>



<?PHP

if(isset($_GET['btn']) && ($_GET['btn']!='')){
     if(isset($_GET['num']) && $_GET['num'] != ''){
        $number  = $_GET['num'];
     }else{
        echo 'ใส่เลขด้วย';
        exit;
     }
     
}



?>