<?php
ob_start();
define('API_KEY','');
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
function SendMessage($chatid,$text,$parsmde,$keyboard){bot('sendMessage',['chat_id'=>$chatid,'text'=>$text,'parse_mode'=>$parsmde,'reply_markup'=>$keyboard]);}
function sendphoto($chat_id, $photo, $caption){bot('sendphoto',['chat_id'=>$chat_id,'photo'=>$photo,'caption'=>$caption]);}
function SendDocument($chatid,$document,$caption){bot('SendDocument',['chat_id'=>$chatid,'document'=>$document,'caption'=>$caption,]);}
function objectToArrays($object){if (!is_object($object) && !is_array($object)) {return $object;}if (is_object($object)) {$object = get_object_vars($object);}return array_map("objectToArrays", $object);}
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$lefc = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@Starcode_IR&user_id=$from_id"))->result->status;
if (strpos($text,'/start') !== false or $text == "↪️ بازگشت"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'
🌷 سلام ' .$first_name.$last_name.' عزیز ، خوش آمدید .
🎵این ربات یک سرویس خودکار جستجوی و دانلود موسیقی در تلگرام است.

🔎 اسم خواننده و آهنگ مورد نظرتو به انگلیسی بنویس تا لیست آهنگ های موجود برات ارسال بشه:
✅ مثال: Shahin Najafi
',
'parse_mode'=>'Html',
]);
exit();
}
elseif(strpos($text,'/download_') !== false){
if($lefc == "left"){
sendMessage($chat_id,"🚫 برای استفاده از ربات باید در کانال ما (@DIRIN_GILIN) عضو شوید...\n⚠️ پس از  اینکه عضو شدید دوباره به ربات مراجعه کرده و درخواست خود را تکرار کنید .",'html',json_encode(['inline_keyboard'=>[[['text'=>"ورود به کانال",'url'=>"https://telegram.me/Starcode_IR"]]]]));
}else{
$text = str_replace('/download_','',$text);
$musicapi = json_decode(file_get_contents("https://apprdjvn.com/api2/mp3?id=$text"));
$mus = objectToArrays($musicapi);
$title = $mus['title'];
$link = $mus['link'];
$photo = $mus['photo'];
$plays = $mus['plays'];
$lyric = $mus['lyric'];
$like = $mus['likes'];
$dislike = $mus['dislikes'];
$downloads = $mus['downloads'];
sendphoto("$chat_id","$photo","🎧 $title\n📯 Plays : $plays\n📥 Downloads : $downloads\n👍 $like / 👎 $dislike \n\n© @DIRIN_GILIN");
SendDocument("$chat_id","$link","© @Starcode_IR");
sendMessage("$chat_id","$lyric","html");
}
}
elseif($text){
$musicapi = json_decode(file_get_contents("https://apprdjvn.com/api2/search?query=$text"));
$mus = objectToArrays($musicapi);
$result = '';
for($i=0;$i<10;$i++){
$a[$i] = $mus['mp3s'][$i]['title'];
$b[$i] = $mus['mp3s'][$i]['id'];
$d[$i] = $mus['mp3s'][$i]['downloads'];
if($a[$i] != ''){
$result .= "🎧 <b>$a[$i]</b>
📥/download_$b[$i] ($d[$i])
----------------------------------
";
}
}
if($a[0] != ''){
sendMessage($chat_id,"$result",'Html');
}else{
sendMessage($chat_id,"🚫 نتیجه ای یافت نشد . . .\n⚠️ باید از حروف انگلیسی برای جستجو استفاده کنید .",'Html');
}

}
?>