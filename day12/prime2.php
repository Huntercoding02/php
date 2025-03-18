<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime</title>
</head>
<body>
    
</body>
</html>

<p>See if your number is a prime number</p>

<form method="GET">
    <input type='number' name='number' required>
    <input type='submit' value='Check!'>
</form>

<?php
if (isset($_GET['number']) && $_GET['number'] !== '') {
    $num = (int)$_GET['number'];

    if ($num < 2) {
        echo "<p>$num is NOT a prime number</p>";
    } else {
        $isPrime = true;

        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                $isPrime = false;
                break;
            }
        }

        if ($isPrime) {
            echo "<p>$num is a prime number!</p>";
        } else {
            echo "<p>$num is NOT a prime number</p>";
        }
    }
}
?>