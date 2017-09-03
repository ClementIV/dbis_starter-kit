<?php 

    $postArray ='[data:'[{"id":"7786797","data":"clockin","time":"2017-06-16 08:10:06","pic":"","verify":1,"ccid":"215"]';
     
    
    $de_json = json_decode($postArray,TRUE);
      $count_json = count($de_json);
        for ($i = 0; $i < $count_json - 2; $i++)
           {
                //echo var_dump($de_json);
 
                  $dt_record = $de_json[$i]['time'];
                  $data_verifytype = $de_json[$i]['verify'];
                  $user = $de_json[$i]['ccid'];
                  $message = json_encode($de_json[$i]['data']);

                }

?>