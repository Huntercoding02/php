<?php
$item_limit = 500;
$domain = 'www.lop/';
// echo '<br>';
// echo date('Y-m-d H:i:s');
// exit;
$url = $domain . 'service/sss_01';
$cal_point = 100;
$event_gacha = 150;
$id_event = 1291;
$cal_gac = 5000;

$chk_tem = 3;
$pnt_chk = 150;
$ClientIp ='';
$data = http_build_query(
    array(
        "clintIP"=>$ClientIp,
        "event"=>$id_event,
        "event_gacha"=>$event_gacha,
        "chk_sum"=>md5($ClientIp.strtotime(date('Y-m-d H:i:s'))),
        "event"=>$id_event,
    )
    );

// $res = $connector->post($url,$data,"json");



?>

<?php
        // echo '<pre>';
        for ($i = 1; $i <= 20; $i++) {
            $users[] = array(
                'code'=> '101',
                'user_name' => "hunter$i",
                'user_logo' => (string) ($i * 5),  // เปลี่ยนค่า user_logo ให้แตกต่างกัน
                'user_id' => 2000 + $i,  // user_id เริ่มจาก 2001
                'user_id01' => 100 + $i  // user_id01 เริ่มจาก 101
            );
        }
        
        // print_r($users);
        $total=[];
        //  for($i=0;$i<15;$i++){
        //     $total[]=[
        //         'name'=>
        //     ];
        //  }
         
        $rs =  $users;
         ?>