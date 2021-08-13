<?php
@session_start();
if (isset($_SESSION['dirname']) && $_SESSION['dirname'] == dirname($_SERVER['SCRIPT_NAME'])){
  $login = true;
}else{
  $login = false;
}
if(isset($_POST['tweet'])){
  $now = date("Y-m-d H:i:s");
  $tweets = simplexml_load_file($xmlfile);
  $newid = $tweets->count() + 1;
  $entry = $tweets->addChild("entry");
  $entry -> addAttribute("id",$newid);
  $entry -> addAttribute("share", $_POST['share']);
  $entry -> addAttribute("person", $_POST['person']);
  $entry -> addChild("date", $now);
  $entry -> addChild("text", $_POST['tweet']);
  if(isset($_POST['retweet'])){
    $entry -> addChild("retweet",$_POST['retweet']);
  }
  if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $tmpfile = $_FILES['image']['tmp_name'];
    $imgfile = "./img/upload/".$newid."_".$_FILES['image']['name'];
    move_uploaded_file($tmpfile, $imgfile);
    $entry -> addChild("img", $imgfile);
  }
  file_put_contents($xmlfile, $tweets->asXML());
}
?>