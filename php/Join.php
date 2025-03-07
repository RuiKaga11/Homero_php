<?php
function strJoin($str){
    $quote = '\'';
    $joined = $quote . $str . $quote;
    return $joined;
}

function tagJoin($str){
    if(is_int($str)){
        $likeHeart = '<img id="likeHeart" src="img\nice_heart.png" alt="likeのハート画像" height="16px", width="16px"/>';
        $startTag = '<button type="button" id="nice">';
        $endTag = '</button>';
        $joined =  $startTag . $likeHeart . $str . $endTag  ;
        return $joined;
    }else{
        $startTag = '<p>';
        $endTag = '</p>';
        $joined = $startTag . $str . $endTag;    
        return $joined;
    }
}
