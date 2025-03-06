<?php
// (未)
# home.htmlから値を受け取る
# ユーザー名だけ、homeでも保持し続けたい→
# しかし、home.htmlにはuserid入力がないので、formを通したuseridが渡されない。
# どうすればいいんだろう？
// いつ、これ↓を実装するか？
// cookie使ってみる？使ったことないけど、調べれば何とかなりそう
//　ログイン→ユーザーIDだけ、cookieに保持。tweet.phpからcookieを取得
// 取得後、ツイートボタンクリックでDBにTEXTと同時にUSERIDを登録する
// ->成形→home.htmlにユーザー名＋ツイート本文を表示できるようにする

// （未）いいねボタンの作成

// （未）カテゴリーの実装


include('getDB.php');
include('Join.php');

class showing{
    function show(){
        echo 'showメソッド呼び出し';
        $dbh = getDb();
        $sql = "SELECT TEXT FROM tweet;";
        $stmt = $dbh->query($sql);
        $row = array();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($stmt);
        // gettype($row);
        echo '</br>';
        // var_dump($row);
        echo '</br>';
        $exrow = array_column($row, 'TEXT');
        // var_dump($exrow);
        echo '</br>';
        if($row){
            echo 'ツイート取得成功';
            echo '</br>ここに過去のツイート</br>';
            foreach($exrow as $rows){
                $tagRows = tagJoin($rows);
                echo $tagRows;
                "\n";
            }
            // header("Location:http://localhost/Homero_php/home.html");
            exit();
        }else{
            echo 'ツイート取得失敗';
            // header("Location:http://localhost/Homero_php/index.html");
            exit();
        }
    }
}

$show = new showing();
$show->show();