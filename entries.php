<?php
header("Content-Type: text/xml");
include("config.php");
$tweets = simplexml_load_file($xmlfile);
$key = "";
if(isset($_GET['key'])) $key = $_GET['key'];
$dels = array();
foreach($tweets as $entry){
  if($entry['share'] == "close" && $key != $sharekey){
    $dels[] = $entry;
  }
}
foreach($dels as $entry){
  unset($entry[0]);
}
echo $tweets->asXML();
?>