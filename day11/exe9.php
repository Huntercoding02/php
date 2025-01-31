<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid black;
        }
        th{
            border-collapse: collapse;
            border: 1px solid black;
        }
        td{
            border-collapse: collapse;
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    ตารางสูตรคูณตั้งแต่แม่ 2 ถึง 25
 
</body>
</html>





<?PHP


echo "<table border='1'><br />";
for($i=2; $i<=13; $i++)
{
echo '<th>'.'แม่ '.$i.'</th>';
}
for($i=1; $i<=12; $i++)
{

    echo '<tr>';
    for ($j=1; $j<=12; $j++)
    {
        
        echo "<td>".$j+1;
        echo " x ". $i  . " = ".($j+1)*$i."</td>";
    }
    echo '</tr>';
}
echo "</table>";



?>
<?php
echo "<table border='1'><br />";
for($i=14; $i<=25; $i++)
{
echo '<th>'.'แม่ '.$i.'</th>';
}
for($i=1; $i<=12; $i++)
{
    echo '<tr>';
    for ($j=14; $j<=25; $j++)
    {
        echo "<td>".$j;
        echo " x ". $i  . " = ".($j)*$i."</td>";
    }
    echo '</tr>';
}
echo "</table>";

echo "</table>";
?>