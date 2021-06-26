<?php
mb_internal_encoding("utf8");

session_start();

?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
        <div class="login"><a href="log_out.php">ログアウト</a></div>
    </header>

    <main>
        <div class="box">
            <h2>会員情報</h2>
            <div class="hello">
                <?php echo "こんにちは！".$_SESSION['name']."さん"; ?>
            </div>
            <form action="mypage_update.php" method="post">
                <div class="profile_pic">
                    <img src="<?php echo $_SESSION['picture']; ?>">
                </div>

                <div class="basic_info">
                    <p>氏名：<input type="text" size="30" value="<?php echo $_SESSION['name'];?>" name="name">
                    </p>

                    <p>メール：<input type="text" size="30" value="<?php echo $_SESSION['mail'];?>" name="mail">
                    </p>

                    <p>パスワード：<input type="text" size="30" value="<?php echo $_SESSION['password'];?>" name="password">
                    <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage_hensyu">
                    </p>
                </div>

                <div class="comments">
                <p><textarea name="comments" cols="75" rows="3"><?php echo $_SESSION['comments'];?></textarea>                
                    </p>
                </div>

                <div class="hensyubutton">
                    <input type="submit" value="この内容に変更する" class="submit_button">
                </div>
            </form>
        </div>
    </main>

    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>