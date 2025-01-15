<?php
    include_once('include/WebConfig.php');
    $web = new mysql_class();
    $web->Connect2Web();
    if(empty($web->connect)){
        echo "Cannot connect DB";
        exit;
    }
    $web->dbname(WebDB);
    $sql = "SELECT * FROM user_info WHERE status in('0','1') ORDER BY createtime DESC";
    $res = $web->select($sql);
    // echo '<pre>';
    // print_r($res)
    if(count($res)>0){
        for($i=0;$i<count($res);$i++){
            echo $res[$i]->username;
            echo '<br>';
            echo '<hr>';
        }
    }
?>