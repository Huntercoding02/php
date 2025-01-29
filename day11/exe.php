<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .o{
        color: red;
    }
</style>
<body>
    <h3>วาดรูปสี่เหลี่ยม XO</h3>
    <form method="GET">
        จำนวนชั้นที่ต้องการ : <input type="number" name="number">
        <button type="submit" name="submit" value="sub">Submit</button>
    </form>
    <hr>

</body>

</html>
<?PHP


if (isset($_GET['submit']) && $_GET['submit'] != '') {
    if (isset($_GET['number']) && $_GET['number'] != '') {
        $number_data = $_GET['number'];
    } else {
        echo "Invalid Input2";
        exit;
    }
}
if ($number_data < '5' || $number_data > '50') {
    echo 'ใส่ขั้นต่ำ 5 น้อยกว่า 50';
    exit;
}

cal($number_data);

// if(isset($_GET['submit']) && $_GET['submit'] !=''){
//     if(isset($_GET['number_data']) && $_GET['number_data'] !=''){
//         $number_data = $_GET['number_data'];
//     }else{
//         echo "Invalid Input2";
//         exit;
//     }
//     echo cal($number_data);
// }else{
//     echo "Invalid Input";
//     exit;
// }



function cal($number_data)
{

    for ($i = 0; $i < $number_data; $i++) {
        echo 'X';

        for ($j = 0; $j < $number_data; $j++) {

            if ($i > $j) {
                echo '<span class="x">X</span>';
            } else {
                echo '<span class="o">O</span>';
            }
        }
        echo '<br>';
    }
}


?>