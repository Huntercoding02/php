<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRY</title>
</head>
<?php

$switch =1;
if($switch == '0'){
    $lang = 'th';
}else{
    $lang = 'en';
}
echo $lang;
echo '<br>';
echo  $lang = __DIR__;
?>
<body>
    <?require_once('config');?>
    <div id='table'>
    <?PHP
    if(count($rs)>0 && $res->code ==101) {?>
    <div>
        <?php if(count($rs->more_data)>0){?>
            <div><img src="<?PHP echo $res?>"> alt=""></div>
        <?PHP } ?>
    </div>
    <?php }else if($res->code == 800){
        echo $check;
    }else{
        echo $hi;
    } ?>
    <?php
    if($res->code == 101 && count($res)>0) {?>
    
    <?php
   
        $c = count($res);
        if(count($res)>20){
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