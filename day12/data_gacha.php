<?php
        // echo '<pre>';
        $money=0;
        for ($i = 1; $i <= 20; $i++) {
            $money +=20;
            $users_gacha[] = array(
                'user_name' => "hunter$i",
                'user_logo' => (string) ($i * 5),  // เปลี่ยนค่า user_logo ให้แตกต่างกัน
                'user_id' => 2000 + $i,  // user_id เริ่มจาก 2001
                'user_id01' => 100 + $i,  // user_id01 เริ่มจาก 101
                'receive_type' => 100 + $i,
                'gold' => 100 + $money,
                'Time' => date('Y/m/d H:i:s')
            );
        }
        
        // print_r($users_gacha);
        
        //  for($i=0;$i<15;$i++){
        //     $total[]=[
        //         'name'=>
        //     ];
        //  }
         
         
         ?>