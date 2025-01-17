<?php


$url="https://api.openai.com/v1/chat/completions";

$arrayHeader_gpt = array();
// $GPT_API_KEY ="" ;
$arrayHeader_gpt[] = "Content-Type: application/json";
$arrayHeader_gpt[] = "Authorization: Bearer ".$GPT_API_KEY ;
$message = "ประเทศไทยมีกี่จังหวัด";
$arrayPostData_gpt = 
'{"model": "gpt-4o-mini","store": true,"messages": [
{"role": "user", "content": "'.$message.'"}]}';

$response_gpt = cuel($url,$arrayPostData_gpt,$arrayHeader_gpt);


// isset($response_gpt)?print_r($response_gpt): "";
$response_gpt_array = json_decode($response_gpt,TRUE);
print_r($response_gpt_array['choices']['0']['message']['content']) ;

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