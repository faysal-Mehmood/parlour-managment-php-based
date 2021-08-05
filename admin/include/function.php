<?php
require_once(dirname(__FILE__)."/../../include/head.php");
require_once(dirname(__FILE__)."/db.php");
require_once(dirname(__FILE__)."/config.php");
ob_start();
session_start();
$user_login = new USER();

if(isset($_SESSION['Parlor_Session'])){
if($user_login->userlevel() !== "admin")
{
  $user_login->redirect('login.php');
}
}else{
  $user_login->redirect('login.php');
}




function current_cpu_usage() {

if (stristr(PHP_OS, 'win')) {

  $cmd = 'typeperf  -sc 1  "\Processor(_Total)\% Processor Time"';
  exec($cmd, $lines, $retval);
  if($retval == 0) {
    $values = str_getcsv($lines[2]);
    return floatval($values[1]);
  } else {
    return false;
  }

} else {

    $load = sys_getloadavg();
    return $load[0];
}

}


function memory_usage() {

    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2]/$mem[1]*100;

    return $memory_usage;
}


$report_opts = array
    (
    'Inappropriate Content',
    'Copyright infringement',
    'Sexual Content',
    'Violence or repulsive content',
    'Spam',
    'Disturbing',
    'Other'
    );



function get_plugin_status($name){
  GLOBAL $mysqli;
$data = $mysqli->query("SELECT * FROM plugins where plugin_name = '$name' ");
while($row = mysqli_fetch_assoc($data)){
  $status = $row["plugin_status"];
   }
   return $status;
}

function action($mysqli,$tbl,$action,$id){

  if ($action == "activate") {
   $mysqli->query("UPDATE $tbl SET active = 'yes' WHERE id = '$id' ");

  } elseif ($action == "deactivate") {
   $mysqli->query("UPDATE $tbl SET active = 'no' WHERE id = '$id' ");
   
  }elseif ($action == "delete") {
   if ($tbl == "products") {
     unlink_files($mysqli,$tbl,$id);
     $mysqli->query("DELETE FROM $tbl WHERE id = '$id' ");
   }
   if ($tbl == "services") {
     unlink_files($mysqli,$tbl,$id);
     $mysqli->query("DELETE FROM $tbl WHERE id = '$id' ");
   }
   if ($tbl == "appointment") {
     $mysqli->query("DELETE FROM $tbl WHERE id = '$id' ");
   }
   if ($tbl == "orders") {
    $mysqli->query("DELETE FROM $tbl WHERE id = '$id' ");
  }
}
}


function unlink_files($mysqli,$tbl,$id){
 if ($tbl == "products") {
   $unlink_file = $mysqli->query("SELECT * FROM products where id = '$id'");
       while($row = mysqli_fetch_assoc($unlink_file)){
       $post_token = $row['post_token'];
       $id = $row['id'];
     }
      unlink(dirname(__FILE__)."/../../".Path_Data."/data/product-images/".$id."/".$post_token.".jpg");
      rmdir(dirname(__FILE__)."/../../".Path_Data."/data/product-images/".$id."/");
 }
 if ($tbl == "services") {
   $unlink_file = $mysqli->query("SELECT * FROM services where id = '$id'");
       while($row = mysqli_fetch_assoc($unlink_file)){
       $post_token = $row['service_token'];
       $id = $row['id'];
     }
      unlink(dirname(__FILE__)."/../../".Path_Data."/data/services-images/".$id."/".$service_token.".jpg");
      rmdir(dirname(__FILE__)."/../../".Path_Data."/data/services-images/".$id."/");
 }
}
function shell_output($cmd) {
    if (stristr(PHP_OS, 'WIN')) { 
      $cmd = $cmd;
    } else {
      $cmd = "PATH=\$PATH:/bin:/usr/bin:/usr/local/bin bash -c \"$cmd\"  2>&1";
    }
    $data = shell_exec( $cmd );
    return $data;
  }


  function check_php_cli($path) { 
    $matches = array();
    $result = shell_output($path." --version");
    if($result) {
      preg_match("/(?:php\\s)(?:version\\s)?(\\d\\.\\d\\.(?:\\d|[\\w]+))/i", strtolower($result), $matches);
      if(count($matches) > 0) {
        $version = array_pop($matches);
        return $version;
      }
      return false;
    } else {
      return false;
    } 
  }
?>
