<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRY</title>
</head>

<?php
require_once('../config.php');
$switch =0;
if($switch == '0'){
    $lang = 'th';
}else{
    $lang = 'en';
}
echo '<pre>';
echo $lang;
echo '<br>';
echo  $lang = basename(__DIR__);
print_r($rs) ;
?>
<body>
    
    <div id='table'>
    <?PHP
    if(count($rs)>0 && $rs['0']['code'] ==101) {?>
    <div>
        <?php if(count($rs->more_data)>0){?>
            <div><img src="<?PHP echo $rs?>"> alt=""></div>
        <?PHP } ?>
    </div>
    <?php }else if($rs->code == 800){
        echo $check;
    }else{
        echo $hi;
    } ?>
    <?php
    if($rs->code == 101 && count($rs)>0) {?>
    
    <?php
   
        $c = count($rs);
        if(count($rs)>20){
            $c = 20;
        }
        for($i=0;$i<$c;$i++){
            $top =$i+1;
            
        }
    ?>
    


    <?php } ?>
    </div>
</body>
</html>