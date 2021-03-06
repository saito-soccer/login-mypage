<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="log.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
        <div class="login"><a href="register.php">新規登録</a></div>
    </header>

    <main>
        <form action="mypage.php" method="post">
            <div class="form_contents">
                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="formbox" size="40" value="<?php
                                                                         if (isset($_COOKIE['login_keep'])) {
                                                                            echo $_COOKIE['mail'];
                                                                   } 
                                                                ?>" name="mail">
                </div>
                <div class="password">
                    <label>パスワード</label><br>
                    <input type="password" class="formbox" size="40" value="<?php
                                                                                if (isset($_COOKIE['login_keep'])) {
                                                                                    echo $_COOKIE['password'];
                                                                           }
                                                                            ?>" name="password">
                </div>

                <div class="login_check">
                    <label><input type="checkbox" class="formbox" size="40" name="login_keep" value="login_keep"
                    <?php
                    if(isset($_COOKIE['login_keep'])){
                        echo "checked='checked'";
                    }
                    ?>>ログイン状態を保持する</label>
                </div>

                <div class="loginbutton">
                    <input type="submit" size="35" name="submit" value="ログイン" class="submit_button">
                </div>
            </div>
        </form>
    </main>

    <footer>
    <div class="footer">
        © 2018 InterNous.inc. All rights reserved
        </div>
    </footer>
</body>