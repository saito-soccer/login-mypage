<?php

mb_internal_encoding("utf8");
// 仮保存されたファイル名で画像ファイルを取得
// (サーバーへ仮アップロードされたディレクトリとファイル名)
$temp_pic_name = $_FILES['picture']['tmp_name'];
// 元のファイル名で画像ファイルを取得。
// 事前に画像を格納しておく「image」という名前のフォルダを作成しておく必要あり
$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
$pdo->exec("insert into img_upload(image)values('".$original_pic_name."');")

?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="register_confirm.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
        <div class="form">
            <div class="form_contents">
                <h2>会員登録　確認</h2>
                <p>こちらの内容で登録しても宜しいでしょうか。</p>

                <div class="name">
                    <label>氏名：</label>
                    <?php echo $_POST['name'];?>
                </div>
                <div class="mail">
                    <label>メール：</label>
                    <?php echo $_POST['mail'];?>
                </div>
                <div class="password">
                    <label>パスワード：</label>
                    <?php echo $_POST['password'];?>
                </div>
                <div class="picture">
                    <label>プロフィール写真：</label>
                    <?php echo $_FILES['picture']['name'];?>
                </div>
                <div class="comments">
                    <label>コメント：</label>
                    <?php echo $_POST['comments'];?>
                </div>

                <div class="buttons">
                    <div class="modoru_button">
                        <a href="register.php">戻って修正する</a>
                    </div>
                    <div class="submit">
                        <form action="register_insert.php" method="post">
                            <input type="submit" value="登録する" size="35" class="submit_button">
                            <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
                            <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
                            <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
                            <input type="hidden" value="<?php echo $path_filename;?>" name="path_filename">
                            <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>