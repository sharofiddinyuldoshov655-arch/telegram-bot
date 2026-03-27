<?php
date_default_timezone_set("Asia/Tashkent");
ob_start();
set_time_limit(0);

/*  BU YERGA TOKEN VA ADMIN ID  */
define("API_KEY","8706298061:AAFCoWrIqIoRNJ5HM2hqgdsI5n6aJ8kF560");
$admin = "7975115536";

/* BOT USERNAME OLISH */
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}

$bot = bot("getMe")->result->username;

/* PAPKALAR */
if(!is_dir("set")) mkdir("set");
if(!is_dir("user")) mkdir("user");
if(!is_dir("step")) mkdir("step");

/* EMOJI TUZATILDI */
$me="📲";

/* GET PUT FUNKSIYA */
function get($f){
if(file_exists($f)) return file_get_contents($f);
return null;
}

function put($f,$v){
file_put_contents($f,$v);
}

/* SEND MESSAGE */
function sms($id,$text,$m=null){
return bot('sendMessage',[
'chat_id'=>$id,
'text'=>"<b>$text</b>",
'parse_mode'=>"HTML",
'reply_markup'=>$m,
]);
}

/* EDIT MESSAGE */
function edit($id,$mid,$tx,$m=null){
return bot('editMessageText',[
'chat_id'=>$id,
'message_id'=>$mid,
'text'=>"<b>$tx</b>",
'parse_mode'=>"HTML",
'reply_markup'=>$m,
]);
}
