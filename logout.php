<?php if(isset($_SERVER['REMOTE_USER'])){
  $_SESSION = array();
  session_destroy();
  header('Location: index.php');
}
?>