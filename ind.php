<?php 
  $content = file_get_contents("php://input");
  $update = json_decode($content, true);
	$textForSend = "hi hi hi"; 
  $t = '{"update_id":552461978,"poll_answer":{"poll_id":"5248948977767809147","user":{"id":91211691,"is_bot":false,"first_name":"Ilya","last_name":"Kanapelka","username":"Ilyakanapelka","language_code":"ru"},"option_ids":[0,1,2]}}';
  $te = (array) json_decode($t);
  $tex = (array) $te['poll_answer'];
	
	$contentArr = (array) json_decode($content);
	$contentCallback = (array) $contentArr['callback_query'];
	$contentMessage = (array) $contentCallback['message'];
	$contentMessageId = $contentMessage['message_id'];
  $contentData = (array) json_decode($contentCallback['data']);

  $userInfo = (array) $tex['user']; 
  $userId = $userInfo['id'];
  var_dump ($tex['option_ids']);
  for($y=0;$y<=count($tex['option_ids'])-1;$y++){
    echo $tex['option_ids'][$y];
  }

  $regex='/\[([\s\S]*?)\]/iu';
  $href='';
  $pArr=array('<p>','</p>','<br>');
  $prot = 111;
    $keyboard = array(
    array(
      array('text'=>'Картридер',
       //'url'=>$href,
       'callback_data'=>"{'text':".$prot.",'Картиридер':'false','mjmj':'123asdz'}"
       )
    )
  );
  $keyboard2 = array(
    array(
       array('text'=>'Кртридер'."\xE2\x9C\x85",
        //'url'=>$href,
        'callback_data'=>"{'text':".$prot.",'Картиридер':'true','mjmj':'123asdz'}"
        )
    )
  );
  $keyboard3 = array(
    array(
       array('text'=>'Кртридер'."\xE2\x9C\x85",
        //'url'=>$href,
        'callback_data'=>"{'text':".$prot.",'Картиридер':'false','mjmj':'123asdz'}"
        )
    )
  );

  $botToken="2129085674:AAG-NyC4bNJFEeUhy8ywWD0O-T2gfObm97I";
  $chatId = 91211691;
  $website="https://api.telegram.org/bot".$botToken;
  //$chatId;  //** ===>>>NOTE: this chatId MUST be the chat_id of a person, NOT another bot chatId !!!**
  $params=[
    'chat_id'=>$chatId,
    //'inline_message_id'=>'123',
    'message_id'=>'',
    'text'=>$textForSend,
    'parse_mode' => 'HTML',
    'reply_markup' =>  json_encode(array('inline_keyboard' => $keyboard2))
  ];
  $params2=[
    'chat_id'=>$chatId, 
    'text'=>$textForSend,
    'parse_mode' => 'HTML',
    'reply_markup' => json_encode(array('inline_keyboard' => $keyboard))
  ];
  $params3=[
    
  'chat_id'=>$chatId, 
  'text'=>$content,
  'parse_mode' => 'HTML',
  //'reply_markup' => json_encode(array('inline_keyboard' => $keyboard2))
  ];
  
  //var_dump($keyboard2[0][0]['callback_data']);
  
  $textForSend = ' ';
  
  echo json_encode($params);
if($content){

  $params['message_id'] = $contentMessageId;
  $params['text'] = $contentData;

    sendMessage($website, $params);
    //sendMessageCont($website, $params);
    editMessage($website, $params);
}
else{
	$textForSend = $content;
	sendMessage($website, $params2);
	}
// sendMessage($website, $params2);

function sendMessage($website, $params2){
  $chs = curl_init($website . '/sendMessage');
  curl_setopt($chs, CURLOPT_HEADER, false);
  curl_setopt($chs, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($chs, CURLOPT_POST, 1);
  curl_setopt($chs, CURLOPT_POSTFIELDS, ($params2));
  curl_setopt($chs, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($chs);
}
function editMessage($website, $params){
  $chs = curl_init($website . '/editMessageReplyMarkup');
  curl_setopt($chs, CURLOPT_HEADER, false);
  curl_setopt($chs, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($chs, CURLOPT_POST, 1);
  curl_setopt($chs, CURLOPT_POSTFIELDS, ($params));
  curl_setopt($chs, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($chs);
}



function sendMessageCont($website, $params){
  $chss = curl_init($website . '/sendMessage');
  curl_setopt($chss, CURLOPT_HEADER, false);
  curl_setopt($chss, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($chss, CURLOPT_POST, 1);
  curl_setopt($chss, CURLOPT_POSTFIELDS, ($params));
  curl_setopt($chss, CURLOPT_SSL_VERIFYPEER, false);
  $results = curl_exec($chss);
}



?>
