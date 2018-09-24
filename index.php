<?php

define('API_KEY','393952240:AAFnwZ9Y2h2n-3YwnkchodABd6p2LIiBMOg');

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
function sendmessage($chat_id, $text){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>"MarkDown"
 ]);
 } 
//-//////
$update = json_decode(file_get_contents('php://input'));
$date= file_get_contents("https://provps.ir/td?td=date");
$one="http://www.aparat.com/live/tv1";
$two="http://www.aparat.com/live/tv2";
$three="http://www.aparat.com/live/tv3";
$four="http://www.aparat.com/live/tv4";
$five="http://www.aparat.com/live/tv5";
$six="http://www.aparat.com/live/irinn";
$seven="http://www.aparat.com/live/ifilm";
$eight="http://www.aparat.com/liveamayesh";
$nine="http://www.aparat.com/live/varzesh";
$ten="http://www.aparat.com/liveasim";
$eleven="http://www.aparat.com/live/mostanad";
$twelve="http://www.aparat.com/live/quran";
$therty="http://www.aparat.com/live/pouya";
$fourteen="http://www.aparat.com/live/hd";
$fifteen="http://www.aparat.com/live/press";
$time= file_get_contents("https://provps.ir/td?td=time");
$message = $update->message; 
$chat_id = $message->chat->id;
$text = $message->text;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;
$id = $chat->id;  
//---------------//
if($text == '/start'){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"سلام به تلویزیون تلگرام خوش اومدیبرای دیدن شبکه مورد نظر روی اسم اون کلیک کن",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"شبکه 1",'callback_data'=>"a"]
              ],
              [
              ['text'=>"شبکه 2",'callback_data'=>"b"]
              ],
              [
              ['text'=>"شبکه 3",'callback_data'=>"f"]
              ],
              [
             ['text'=>"شبکه 4",'callback_data'=>"m"]                       
              ],
			  [
			  ['text'=>"شبکه 5",'callback_data'=>"p"]
			  ],
			  [
			  ['text'=>"شبکه خبر",'callback_data'=>"kh"]
			  ],
			  [
			  ['text'=>"شبکه ifilm",'callback_data'=>"i"]
			  ],
			  [
			  ['text'=>"شبکه نمایش",'callback_data'=>"n"]
			  ],
			  [
			  ['text'=>"شبکه ورزش",'callback_data'=>"v"]
			  ],
			  [
			  ['text'=>"شبکه نسیم",'callback_data'=>"nn"]
			  ],
			  [
			  ['text'=>"شبکه مستند",'callback_data'=>"mm"]
			  ],
			  [
			  ['text'=>"شبکه قران",'callback_data'=>"q"]
			  ],
			  [
			  ['text'=>"شبکه پویا",'callback_data'=>"pp"]
			  ],
			  [
			  ['text'=>"شبکه HD",'callback_data'=>"hd"]
			  ],
			  [
			  ['text'=>"شبکه presstv",'callback_data'=>"pt"]
			  ],
              ]
        ])
 ]);
}
elseif($data == "a"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$one",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "b"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه دو با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$two",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "f"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$three",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "m"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$four",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "p"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$five",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "kh"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$six",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "i"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$seven",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "n"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$eight",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "v"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$nine",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "nn"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$ten",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "mm"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$eleven",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "q"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$twelve",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "pp"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$therty",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "hd"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$fourteen",
 'parse_mode'=>"MarkDown",
 ]);
}
elseif($data == "pv"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"شبکه مورد نظر با موفقیت بارگذاری شد",
        'show_alert'=>true
 ]);
bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>"شبکه با موفقیت بارگذاری شد برای تماشا روی کادر زیر کلیک کنید$fifteen",
 'parse_mode'=>"MarkDown",
 ]);
}
else {
sendmessage($chat_id , " این پیامی که شما ارسال کردید قابل شناسایی برای ربات نیست!!!");
}
//this robat creadit by pj
in @robat_saz
you can join it
?>