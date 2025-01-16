
<?php 
	/*Get Data From POST Http Request*/
	//ใส่ข้อมูลแบบเจสัน
    $url="https://api.openai.com/v1/chat/completions";
	$datas = file_get_contents('php://input');
	/*Decode Json From LINE Data Body*/
	$deCode = json_decode($datas,true);
	//file_get_contents('php://input')  เป็นเจสันอยุ่แล้ว
	file_put_contents('log.txt', "===============================" . PHP_EOL, FILE_APPEND);
	file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
	
    $replyToken = isset($deCode['events'][0]['replyToken'])?$deCode['events'][0]['replyToken']:"";
	$userId = isset($deCode['events'][0]['source']['userId'])?$deCode['events'][0]['source']['userId']:"";
	$text = isset($deCode['events'][0]['message']['text'])?$deCode['events'][0]['message']['text']:"";
	
	// print_r($deCode);
$check_gpt = 'gpt=';
$check_gemini = 'gemini=';

// $gptcut = substr($text, 4);
// $geminicut = substr($text, 7);
// $ex = explode("=", $text);
// $caseChk;
if(strpos($text,'=')!== false){
	list($caseChk,$msg) = explode('=',$text,2);
}
$is_gemini = trim($caseChk);


if($is_gemini == 'gpt'){


	//gpt
	

	$arrayHeader_gpt = array();
	$GPT_API_KEY ="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" ;
	$arrayHeader_gpt[] = "Content-Type: application/json";
	$arrayHeader_gpt[] = "Authorization: Bearer ".$GPT_API_KEY ;
	$message = $msg;
	$arrayPostData_gpt = 
	'{"model": "gpt-4o-mini","store": true,"messages": [
	{"role": "user", "content": "'.$message.'"}]}';
	
	$response_gpt = cuel($url,$arrayPostData_gpt,$arrayHeader_gpt);
	

	// isset($response_gpt)?print_r($response_gpt): "";
	$response_gpt_array = json_decode($response_gpt,TRUE);
	$result = 'GPT :'.$response_gpt_array['choices']['0']['message']['content'] ;
	
	// $msgreply = "ไม่รู้ดิ";
	// if($text=="กินอะไรดี"){
	// 	$msgreply = "อะไรก็ได้";
	// }
	   
		$messages = [];
		$messages['replyToken'] = $replyToken;
		$messages['messages'][0] = getFormatTextMessage($result);
		
		$encodeJson = json_encode($messages);
		file_put_contents('log.txt', "==============mess=================" . PHP_EOL, FILE_APPEND);
		file_put_contents('log.txt', $encodeJson . PHP_EOL, FILE_APPEND);
		
		$LINEDatas['url'] = "https://api.line.me/v2/bot/message/reply";
		  $LINEDatas['token'] = "/J+UZJuP7Q42bJn9s8CYe4ItohBjd5bbwaIal9WK602HZS0nbjQdc7Us+sjxa/bGzd8SNKDNcVxaiii6MVwyLkgL4+nd/hT6qDFgUqWvDwalZp6+4AOTkWUboLJNzYDc169zOPCcsufWu/sZJffGcQdB04t89/1O/w1cDnyilFU=";
	
		  $results = sentMessage($encodeJson,$LINEDatas);
		
		/*Return HTTP Request 200*/
		http_response_code(200);

}else if($is_gemini == 'gemini'){

	//gemini


	$GEMINI_API_KEY= "AIzaSyDCVHWE1mkTA2UrOnd-8Tj-vmooVRuM0xk";
$url="https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=".$GEMINI_API_KEY;
$arrayHeader_gemini = array();
$arrayHeader_gemini[] = "Content-Type: application/json";
$message = $msg;
$arrayPostData_gemini ='{"contents": [{"parts":[{"text":"'.$message.'"}]}]}';

$response_gemini = cuel($url,$arrayPostData_gemini,$arrayHeader_gemini);


// isset($response_gemini)?print_r($response_gemini): "";
$response_gemini_array = json_decode($response_gemini,TRUE);
// echo $response_gemini_array  ["candidates"][0]["content"]["parts"][0]["text"];
$result = 'Gemini: '.$response_gemini_array["candidates"][0]["content"]["parts"][0]["text"];
echo($result) ;

	$messages = [];
	$messages['replyToken'] = $replyToken;
	$messages['messages'][0] = getFormatTextMessage($result);
    
	$encodeJson = json_encode($messages);
	file_put_contents('log.txt', "==============mess=================" . PHP_EOL, FILE_APPEND);
	file_put_contents('log.txt', $encodeJson . PHP_EOL, FILE_APPEND);
	
	$LINEDatas['url'] = "https://api.line.me/v2/bot/message/reply";
  	$LINEDatas['token'] = "/J+UZJuP7Q42bJn9s8CYe4ItohBjd5bbwaIal9WK602HZS0nbjQdc7Us+sjxa/bGzd8SNKDNcVxaiii6MVwyLkgL4+nd/hT6qDFgUqWvDwalZp6+4AOTkWUboLJNzYDc169zOPCcsufWu/sZJffGcQdB04t89/1O/w1cDnyilFU=";

  	$results = sentMessage($encodeJson,$LINEDatas);
	
	/*Return HTTP Request 200*/
	http_response_code(200);
}
   

	function getFormatTextMessage($text)
	{
		$datas = [];
		$datas['type'] = 'text';
		$datas['text'] = $text;

		return $datas;
	}

	function sentMessage($encodeJson,$datas)
	{
		$datasReturn = [];
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $datas['url'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $encodeJson,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Bearer ".$datas['token'],
		    "cache-control: no-cache",
		    "content-type: application/json; charset=UTF-8",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		    $datasReturn['result'] = 'E';
		    $datasReturn['message'] = $err;
		} else {
		    if($response == "{}"){
			$datasReturn['result'] = 'S';
			$datasReturn['message'] = 'Success';
		    }else{
			$datasReturn['result'] = 'E';
			$datasReturn['message'] = $response;
		    }
		}

		return $datasReturn;
	}




    function cuel($url,$arrayPostData_gpt, $arrayHeader_gpt=array())
    {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        
        // curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader_gpt);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader_gpt);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayPostData_gpt);
        
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        return $server_output;
    }
?>