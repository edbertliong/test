<?php

    require_once "../Pos/Date.php";
    
    try{
        
        $local = new Pos_Date();
        echo '<p>Local Time : ' . $local->format('F jS, Y h:i A') . '</p>' ;
        
        $tz = new DateTimeZone('Asia/ShangHai');
        $beijing = new Pos_Date($tz);
        echo '<p>Shanghai Time : ' . $beijing->format('F jS, Y h:i A') . '</p>' ;
        
    }catch(Exception $e){
        echo $e;
    }