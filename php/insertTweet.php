<?php
include('getDB.php');
include('Join.php');

class tweeting{
    function tweetRegister(){
        $tweet = $_POST['tweet'];
        $category = $_POST['category'];
        $dbTweet = strJoin($tweet);
        $dbCategory = strJoin($category);
        if($tweet != null){
            echo '文字列空判定';
            $dbh = getDb();
            $sql = "INSERT INTO tweet (TEXT,CATEGORY) VALUES ({$dbTweet},{$dbCategory});";
            $stmt = $dbh->prepare($sql);
            $result = $stmt->execute();
            var_dump($stmt);
            var_dump($result);
        }else{
            echo 'TEXTが空';
        }
        if($result){
            echo 'ツイート成功</br>';
            header("Location:http://localhost/Homero_php/home.html");
            exit();
        }else{
            echo 'ツイート失敗';
           exit();
        }
    }
}
$tweet = new tweeting();
$tweet->tweetRegister();