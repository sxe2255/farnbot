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
  $contentData = $contentCallback['data'];

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
            'callback_data'=>"{'Картридер':'false'}"
      )
    ),
    array(
      array('text'=>'Изображение с камер (SMART)',
            'callback_data'=>"{'Изображение с камер (SMART)':'false'}"
      ),
      array('text'=>'Свободное место VIDEO (SMART)',
            'callback_data'=>"{'Свободное место VIDEO(SMART)':'false'}"
      ),
      array('text'=>'Факт записи камер (SMART)',
            'callback_data'=>"{'Факт записи камер (SMART)':'false'}"
      ),
      array('text'=>'Очистка LOG-файлов',
            'callback_data'=>"{'Очистка LOG-файлов':'false'}"
      ),
      array('text'=>'Тест диспенсера',
            'callback_data'=>"{'Тест диспенсера':'false'}"
      ),
      array('text'=>'Тест чекового принтера',
            'callback_data'=>"{'Тест чекового принтера':'false'}"
      ),
      array('text'=>'Тестовая операция',
            'callback_data'=>"{'Тестовая операция':'false'}"
      ),
      array('text'=>'Изображение с камер (TRAL)',
            'callback_data'=>"{'Изображение с камер (TRAL)':'false'}"
      ),
      array('text'=>'Состояние HDD (TRAL)',
            'callback_data'=>"{'Состояние HDD (TRAL)':'false'}"
      ),
      array('text'=>'Факт записи камер (TRAL)',
            'callback_data'=>"Факт записи камер (TRAL)':'false'}"
      ),
      array('text'=>'Закончил!',
            'callback_data'=>"{'Закончил!':'false'}"
      )
    )
  );
  $keyboard2 = array(
    array(
      array('text'=>'Картридер'."\xE2\x9C\x85",
        //'url'=>$href,
        'callback_data'=>"{'Картридер':'true'}"
      ),
      array('text'=>'Изображение с камер (SMART)'."\xE2\x9C\x85",
            'callback_data'=>"{'Изображение с камер (SMART)':'true'}"
      ),
      array('text'=>'Свободное место на диске VIDEO более 100 ГБ (SMART)'."\xE2\x9C\x85",
            'callback_data'=>"{'Свободное место на диске VIDEO более 100 ГБ (SMART)':'true'}"
      ),
      array('text'=>'Факт записи камер (SMART)'."\xE2\x9C\x85",
            'callback_data'=>"{'Факт записи камер (SMART)':'true'}"
      ),
      array('text'=>'Очистка системного диска от старый LOG-файлов'."\xE2\x9C\x85",
            'callback_data'=>"{'Очистка системного диска от старый LOG-файлов':'true'}"
      ),
      array('text'=>'Тест диспенсера'."\xE2\x9C\x85",
            'callback_data'=>"{'Тест диспенсера':'true'}"
      ),
      array('text'=>'Тест чекового принтера'."\xE2\x9C\x85",
            'callback_data'=>"{'Тест чекового принтера':'true'}"
      ),
      array('text'=>'Тестовая операция'."\xE2\x9C\x85",
            'callback_data'=>"{'Тестовая операция':'true'}"
      ),
      array('text'=>'Изображение с камер (TRAL)'."\xE2\x9C\x85",
            'callback_data'=>"{'Изображение с камер (TRAL)':'true'}"
      ),
      array('text'=>'Состояние HDD (TRAL)'."\xE2\x9C\x85",
            'callback_data'=>"{'Состояние HDD (TRAL)':'true'}"
      ),
      array('text'=>'Факт записи камер (TRAL)'."\xE2\x9C\x85",
            'callback_data'=>"Факт записи камер (TRAL)':'true'}"
      ),
      array('text'=>'Закончил!'."\xE2\x9C\x85",
            'callback_data'=>"{'Закончил!':'true'}"
      )
    )
  );
  $keyboard3 = array(
    array(
       array('text'=>'Картридер'."\xE2\x9C\x85",
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
    'message_id'=>'', 
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
  $params['text'] = '';

    //sendMessage($website, $params);
    //sendMessageCont($website, $params);
  if(stripos($contentData,"'Картридер':'false'")){
    editMessage($website, $params);
  }else if(stripos($contentData,"'Картридер':'true'")){
    $params2['message_id'] = $contentMessageId;
    editMessage($website, $params2);
  }

    //editMessage($website, $params);
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
