<?php
// (未)
# home.htmlから値を受け取る。
// UserIdはlogin.php(index.html)から受け取り、保持する。
# ユーザー名だけ、homeでも保持し続けたい→
# しかし、home.htmlにはuserid入力がないので、formを通したuseridが渡されない。
# どうすればいいんだろう？
// いつ、これ↓を実装するか？
// cookie使ってみる？使ったことないけど、調べれば何とかなりそう
//　ログイン→ユーザーIDだけ、cookieに保持。tweet.phpからcookieを取得
// 取得後、ツイートボタンクリックでDBにTEXTと同時にUSERIDを登録する
// ->成形→home.htmlにユーザー名＋ツイート本文を表示できるようにする

// 未）いいねボタンの作成
// 完了）いいねボタンだけ、int扱いなので、Join.phpのtagJoin()でifでintのとき～～
// 完了）タグ、もしくはid（HTMLの話）をいいねボタン用に出力して、フロントで見た目の変更などを可能にする
// 未）フロントでいいねボタンの見た目（色も変わる）作成（適当にパクれ）
// 未）js(Ajax)で非同期通信の実装→DBにクリックした分のいいねを加算させる

// （未）ソート機能は後でつくる→非同期通信？で作ってみよう（ソートボタンで遷移をはさみたくない）

// （完了）カテゴリーの実装
// 実装中
//　カテゴリーを選択できるhtmlを作成
// 指定したカテゴリーがDBに保存される
// ※カテゴリーがユーザーに見えるようにするかしないか？？
// カテゴリーを呼び出せる、表示できる->OK！！！！


include('getDB.php');
include('Join.php');

class showing{
    function show(){
        echo 'showメソッド呼び出し</br>';
        $dbh = getDb();
        $sql = "SELECT TEXT,CATEGORY,LIKED FROM tweet;";
        $stmt = $dbh->query($sql);
        $row = array();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $exRow = array_column($row, null);
        $exText = array_column($row, 'TEXT');
        $exCategory = array_column($row, 'CATEGORY');
        // var_dump($exRow);
        echo '</br>';
        // print_r($exRow);
        if($row){
            echo 'ツイート取得成功';
            echo '</br>ここに過去のツイート</br>';
            foreach((array)$exRow as $rows){
                $keys = array_keys($rows);
                echo '<hr>';
                foreach($rows as $key => $value){
                    $joinedValue = tagJoin($value);
                    echo $joinedValue;
                }
                echo '</br>';
            }
            exit();
        }else{
            echo 'ツイート取得失敗';
            exit();
        }
    }
}

$show = new showing();
$show->show();