<?php
if($login){
  echo <<<HTML
    <div class="flex">
    <form action="index.php" method="POST" enctype="multipart/form-data">

      <div class="flex">
        <textarea name="tweet" placeholder="質問をする" class="textarea" maxlength="60"></textarea>
        <label for="send">
          <i class="fas fa-paper-plane icon-size send"></i>
        </label>
      </div>

      <div>
        <input type="text" name="retweet" class="rt" pattern="^@[0-9a-zA-Z]+/[0-9a-zA-Z]+:[0-9]+$" title="@ユーザ名/ディレクトリ:番号" />
      </div>

      <div class="flex option">
        <i class="fas fa-user size"></i>
        <select name="person" class="select">
          <option value="teacher">教師から</option>
          <option value="student">学生から</option>
        </select>
        <i class="far fa-eye size"></i>
        <select name="share" class="select">
          <option value="open">みんなに</option>
          <option value="close">先生だけに</option>
        </select>
        <label for="img">
          <i class="far fa-image size"></i>
        </label>
      </div>
      
      <input type="file" name="image" id="img" class="img-button" accept="image/gif,image/jpeg,image/png" />
      <div class="button">
        <input type="submit" id="send" class="send-button" value="" />
      </div>
      </form>
    </div>
HTML;
}else{
  echo "<a href='login.php' class='login'>ログイン</a>";
}
?>