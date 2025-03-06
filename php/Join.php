<?php
function strJoin($str){
    $quote = '\'';
    $joined = $quote . $str . $quote;
    return $joined;
}

function tagJoin($str){
    if(is_int($str)){
        $startTag = '<p id="nice">';
        $endTag = '</p>';
        $joined = $startTag . $str . $endTag;
        return $joined;
    }else{
        $startTag = '<p>';
        $endTag = '</p>';
        $joined = $startTag . $str . $endTag;    
        return $joined;
    }
}
