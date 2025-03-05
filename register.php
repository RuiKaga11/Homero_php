<?php

$userID = $_POST['userid'];
$password = $_POST['pass'];

function getDb(){
$dsn = 'mysql:dbname=homero; host=127.0.0.1; charset=utf8';
$usr = 'testusr';
$passwd = 'hogehoge';
    try{
        $dbh = new PDO($dsn,$usr,$passwd);
        print'接続成功</br>';
    }catch(PDOExceptiion $e){
        die("接続エラー：{$e->getMessage()}");
    }finally{
        // $dbh = null;
    } 
    return $dbh;
}


# アカウント登録機能の実装
#　ここまで完了！
# 登録成功→そのまま登録したアカウントでログインする機能、つける？

function strJoin($str){
    $quote = '\'';
    $joined = $quote . $str . $quote;
    return $joined;
}

class register{
    
    function register(){
        $User = $_POST['userid']; 
        $Pass = $_POST['pass'];
        $dbUser = strJoin($User);
        $dbPass = strJoin($Pass);
        echo $dbUser;
        $dbh = getDb();
        // $sql = "SELECT * FROM account WHERE USERID = {$dbUser} AND PASSWORD = {$dbPass};";
        $sql = "INSERT INTO account (USERID,PASSWORD) VALUES ({$dbUser},{$dbPass});";
        // $stmt = $dbh->query($sql);
        $stmt = $dbh->prepare($sql);
        $result = $stmt->execute();
        var_dump($stmt);
        var_dump($result);
        if($result){
            echo '登録成功';
            header("Location:http://localhost/Homero_php/index.html");
            exit();
        }else{
            echo '登録失敗';
            header("Location:http://localhost/Homero_php/registar.html");
            exit();
        }
    }
}

$login = new register();
$login->register();

