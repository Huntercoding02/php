<?php
print_r($_POST);
if(isset($_POST['selected'])){
    $selectedValue = $_POST['selected'];
    echo "ได้รับค่า: " . $selectedValue;
}
?>