<?php
include("config.php");
include("post.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  header("Location:http://webdesign.center.wakayama-u.ac.jp:60080/~s256110/myclass/index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta http-equiv="Content-Type" content="tesxt/html"; charset=UTF-8 />
    <link rel="stylesheet" href="style.css">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="img/parts/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0e5cc0f0b7.js" crossorigin="anonymous"></script>
  </head>
  <body>
      <header class="left-menu">
        <ul>
          <li class="logo">
            <i class="fab fa-black-tie logo-icon"></i>Anonymous</li>
          <li class="menu">
            <a href="https://moodle3.wakayama-u.ac.jp/2021/">
            moodle
            </a>
          </li>
          <li class="menu">
            <a href="https://teams.microsoft.com/l/team/19%3aSgHCIBvpvFP4tWR2MC3EA7DonDK2SXqqiJpSkKdpsEw1%40thread.tacv2/conversations?groupId=4bcdac7e-7c82-41e2-814e-f6326dc31a8d&tenantId=017b3621-1879-4c5e-a9a9-f81002ae18dd">
            Teams
            </a>
          </li>
        </ul>
      </header>
      <main class="main-contents">
        <div class="header flex">
          <i class="far fa-comment header-icon"></i>
          <h1>とある授業の匿名チャットルーム</h1>
        </div>
        <div class="inputarea">
          <?php
          include("form.php");
          ?>
        </div>
        <div class="timeline">
          <?php
          include("timeline.php");
          ?>
        </div>
      </main>
      <footer>
        <div class="right-menu"></div>
      </footer>
  </body>
</html>