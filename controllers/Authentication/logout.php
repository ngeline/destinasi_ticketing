<?php 

include('../../setting/connection.php');

session_start();
$level = $_SESSION["level"];
session_unset();
session_destroy();
if($level == 'admin'){
    header("Location: ".$base_url."/admin/login.php");
}else{
    header("Location: ".$base_url."/index.php");
}

?>