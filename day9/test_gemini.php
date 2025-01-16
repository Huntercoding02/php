<?PHP

$GEMINI_API_KEY= "AIzaSyDCVHWE1mkTA2UrOnd-8Tj-vmooVRuM0xk";
$url="https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=".$GEMINI_API_KEY;
$arrayHeader_gemini = array();
$arrayHeader_gemini[] = "Content-Type: application/json";
$message = "ประเทศจะหยุดหนาวเมื่อไหร่";
$arrayPostData_gemini ='{"contents": [{"parts":[{"text":"'.$message.'"}]}]}';

$response_gemini = cuel($url,$arrayPostData_gemini,$arrayHeader_gemini);


// isset($response_gemini)?print_r($response_gemini): "";
$response_gemini_array = json_decode($response_gemini,TRUE);
echo $response_gemini_array ["candidates"][0]["content"]["parts"][0]["text"];

function cuel($url,$arrayPostData_gemini, $arrayHeader_gemini=array())
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader_gemini);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayPostData_gemini);
    
    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    return $server_output;
}
?>