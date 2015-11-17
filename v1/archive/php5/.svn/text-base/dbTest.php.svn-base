<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Database Test</title>
    </head>
    <body>
    <?php
      include_once '/core/php/DB.class.php';
      
      $db = new DB('EAV');
      $query = sprintf("SELECT * FROM fs_aqm_eav.eav_headers where contract like '%s' order by contract
                                    ",'%BYRON%');
      $results = $db->runQuery($query);
      if(!$db->hasErrors()){
        foreach($results as $key){
            print_r($key);
            print('<br><br>');
        }
        print('<hr>');
      }
      else{
          print("Has errors");
      }
      $db->closeConn();
      
      
      $db2 = new DB('SS', 'P');
      $query2 = sprintf("SELECT * FROM fs_aqm_ss.aqm_master_np where upper(last_name) like upper('%s')
                                    ",'%Acton%');
      $results2 = $db2->runQuery($query2);
      if(!$db2->hasErrors()){
          foreach($results2 as $key){
              print_r($key);
              print('<br><br>');
          }
          print('<hr>');
      }
      else{
          print("Has errors");
      }
      $db2->closeConn();
    ?>
    </body>
</html>
