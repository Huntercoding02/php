<?php
        echo '<pre>';
        for ($i = 1; $i <= 20; $i++) {
            $users[] = array(
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
         
         
         ?>