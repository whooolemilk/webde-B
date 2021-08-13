<?php
if (file_exists($xmlfile)){
  $tweets = simplexml_load_file($xmlfile);
  foreach($tweets as $entry){
    if($login || $entry['share'] != "close"){
      $entries[(string)$entry->date] = $entry;
    }
  }
if(file_exists($flwfile)){
  $follows = simplexml_load_file($flwfile);
  foreach($follows as $flw){
    $baseurl=$server."~".$flw['userid']."/".$flw['dir'];
    $twurl=$baseurl."/entries.php?key=".$flw['key'];
    $tweets=simplexml_load_file($twurl);
    foreach($tweets as $entry){
      $twid="@".$flw['userid']."/".$flw['dir'].":".$entry['id'];
      $entry->addChild("followid", $twid);
      if($entry->img != ""){
        $entry->img = $baseurl."/".$entry->img;
      }
      $entries[(string)$entry->date."@".$flw['userid']]=$entry;
    }
  }
}
krsort($entries);
foreach($entries as $entry){
  if($entry['person'] == "teacher"){
    $per = "<p class='user-t'>Teacher</p>";
    $userimg = "<img src='img/parts/icon2.png'/>";
    $col = "white";
  }else{
    $per = "<p class='user-s'>Student</p>";
    $userimg = "<img src='img/parts/icon4.png'/>";
    $col = "green";
  }
  echo "<hr />";
  echo "<div class = 'entry ".$col." '>";
  if($entry->followid != ""){
    echo "<div class='follow'>".$entry->followid."</div>";
  }
  if($entry['share'] == "close"){
    $mk = "先生だけに：";
  }else{
    $mk = "みんなに：";
  }
  //ユーザー
  echo "  <div class='person flex'>".$userimg."<div class='user-text'>".$per;
  //日付
  echo "  <div class='date'>".$mk.$entry->date."</div>"."</div>"."</div>";
  //テキスト
  echo "  <div class='text'>".$entry->text;
  //画像
  if($entry->img !=""){
    echo "<img src='".$entry->img."'/>"."</div>";
  }else {
    echo "</div>";
  }
  //リツイート
  if($entry->retweet != ""){
    echo "<div class='retweet'>";
    echo "<div class='follow'>".$entry->retweet."</div>";
    list($at, $userid, $dir, $id) = split('[@/:]', $entry->retweet);
    $baseurl = $server."~".$userid."/".$dir;
    $follows = simplexml_load_file($flwfile);
    $key = "";
    foreach($follows as $flw){
      if($flw['userid'] == $userid){
        $key = $flw['key'];
      }
    }
    $retweets = simplexml_load_file($baseurl."/entries.php?key=".$key);
    foreach($retweets as $rtentry){
      if($rtentry['id'] == $id){
        echo "<div class='date'>".$rtentry->date."</div>";
        echo "<div class='text'>".$rtentry->text."</div>";
        if($rtentry->img != ""){
          echo "<img src='".$baseurl."/".$rtentry->img."' />";
        }
      }
    }
    echo "</div>";
  }
  echo "</div>"."\n";
}
}
?>