<?php

require_once('gptAPIKey.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['serviceName']) && isset($_POST['subCategoryID'])) {

        $serviceName = htmlspecialchars($_POST['serviceName']);
        $subCategoryID = intval($_POST['subCategoryID']);

        $sqlGetText0 = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM text WHERE order = 0"));
        $sqlGetText1 = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM text WHERE order = 1"));
        $sqlGetText2 = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM text WHERE order = 2"));

        // Define o prompt com base no valor de $subCategoryID
        if ($subCategoryID === 0) {
            $prompt = $serviceName . $sqlGetText0['text'];
        } elseif ($subCategoryID === 1) {
            $prompt = $serviceName . $sqlGetText1['text'];
        } elseif ($subCategoryID === 2) {
            $prompt = $serviceName . $sqlGetText2['text'];
        } else {
            echo "Invalid subCategoryID.";
            exit;
        }

        $apiKey = "OPENAI_KEY";

        function getChatGPTResponse($prompt, $apiKey) {
            $url = "https://api.openai.com/v1/chat/completions";

            $data = [
                "model" => "gpt-4",
                "messages" => [
                    ["role" => "user", "content" => $prompt]
                ],
                'temperature' => 0.9,
                'max_tokens' => 800,
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


    } else {
        echo "Service name or subCategoryID not provided.";
    }
} else {
    echo "Invalid request method.";
}



function optoInsertPrompt($subcategory_id, $prompt_id, $text){
    //CREATED BY OPTO
    require_once("optoApi/conexaoPDO.php");
    $sqlInsertPromptBD = mysqli_query($conexao, "INSERT INTO gpttext (subcateboty_id, text, prompt_id)VALUES('$subcategory_id', '$text','$prompt_id')");
    
}

