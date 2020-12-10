<?php

class log {
    public function addLoginLog($date, $ip, $loggedIn){
        $file = fopen("log.txt","a");

        fwrite($file, "LOG: LOGIN ATTEMPT: $date | USER IP: $ip | ATTEMPT: $loggedIn"."\n");

        fclose($file);
    }
}