<?php

 function secure_randon($length){
     $random_string='';
     for($i=0; $i<$length;$i++){
         $number =random_int(0,30);
         $charater=base_convert($number,10,36);
         $random_string .=$charater;
     }
     return $random_string;
 }

 echo strtoupper(secure_randon(5));
?>