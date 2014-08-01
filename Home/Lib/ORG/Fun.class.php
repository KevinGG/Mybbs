<?php
class Fun extends Think{
   public function __construct(){
    date_default_timezone_set(PRC);
   }

   public function myGetDate(){//获得当前时间
    $date=date("Y-m-d H:i:s");
    return $date;
   }
}
?>