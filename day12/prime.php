<?php
// ฟังก์ชันตรวจสอบจำนวนเฉพาะ
function is_prime($num) {
    if ($num < 2) {
        return false; // 0 และ 1 ไม่ใช่จำนวนเฉพาะ
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false; // ถ้าหารลงตัว ไม่ใช่จำนวนเฉพาะ
        }
    }
    return true; // ถ้าไม่พบตัวหาร แสดงว่าเป็นจำนวนเฉพาะ
}

// ฟังก์ชันแสดงค่าจำนวนเฉพาะ 0-20
function show_prime_numbers($max) {
    echo "<h3>Prime Numbers from 0 to $max</h3>";
    for ($i = 0; $i <= $max; $i++) {
        if (is_prime($i)) {
            echo "$i is Prime<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Numbers</title>
</head>
<body>
    <?php
    // แสดงค่าจำนวนเฉพาะ 0-20 ทันทีที่โหลดหน้าเว็บ
    show_prime_numbers(5);
    ?>
</body>
</html>
