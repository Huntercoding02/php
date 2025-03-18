<?php
function is_prime($num) {
    if ($num < 2) {
        return false; // 0 และ 1 ไม่ใช่จำนวนเฉพาะ
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false; // ถ้ามีตัวหาร แสดงว่าไม่ใช่จำนวนเฉพาะ
        }
    }
    return true;
}

function process_numbers($input) {
    // ตรวจสอบว่าข้อมูลที่รับเข้ามาเป็นตัวเลขล้วนหรือไม่
    if (!ctype_digit($input)) {
        echo "Error"; // ถ้ามีอักขระที่ไม่ใช่ตัวเลข แสดง Error
        return;
    }

    $max = (int)$input;
    if ($max > 50000) {
        echo "Error: Value too large"; // ป้องกันค่าที่เกิน 50,000
        return;
    }

    $numbers = [];
    $primes = [];

    for ($i = 1; $i <= $max; $i++) {
        if (is_prime($i)) {
            $primes[] = $i;
        } else {
            $numbers[] = $i;
        }
    }

    echo "number: " . implode(" ", $numbers) . "<br>";
    echo "prime number: " . implode(" ", $primes);
}

if (isset($_GET['number'])) {
    process_numbers($_GET['number']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Number Checker</title>
</head>
<body>
    <form method="GET">
        <label>Input a number (max 50,000):</label>
        <input type="text" name="number" required>
        <button type="submit">Check</button>
    </form>
</body>
</html>
