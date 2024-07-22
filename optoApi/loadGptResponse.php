<?php
require_once('gptAPIKey.php');

$apiKey = "OPENAI_KEY";

$subCategoryText = $_GET['text'];

$prompt = "Crie um contexto para a palavra chave da subcategoria: ". $subCategoryText; 


function getChatGPTResponse($prompt, $apiKey) {
    $url = "https://api.openai.com/v1/chat/completions";

    $data = [
        "model" => "gpt-4",
        "messages" => [
            ["role" => "user", "content" => $prompt]
        ],
        'temperature' => 0.9,
        'max_tokens' => 500,
        'frequency_penalty' => 1,
        'presence_penalty' => 1
    ];

    $options = [
        'http' => [
            'header'  => "Content-Type: application/json\r\n" .
                         "Authorization: Bearer $apiKey\r\n",
            'method'  => 'POST',
            'content' => json_encode($data)
        ]
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        return "Error contacting OpenAI API.";
    }

    $response = json_decode($result, true);
    return $response['choices'][0]['message']['content'];
}


$response = getChatGPTResponse($prompt, $apiKey);
echo $response;


?> 