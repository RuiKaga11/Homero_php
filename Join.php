<?php
function strJoin($str){
    $quote = '\'';
    $joined = $quote . $str . $quote;
    return $joined;
}

function tagJoin($str){
    $startTag = '<p>';
    $endTag = '</p>';
    $joined = $startTag . $str . $endTag;
    return $joined;
}