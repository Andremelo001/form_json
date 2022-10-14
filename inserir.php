<?php

//convertendo os dados em json
if(isset($_POST['submit'])){

$new_message = array(

    "desc" => $_POST['desc'],
    "client" => $_POST['client'],
    "cpf" => $_POST['cpf']

);

if (filesize("Result_json/messages.json") == 0) {

    $first_record = array($new_message);

    $data_to_save = $first_record;

}else{

    $old_records = json_decode(file_get_contents("Result_json/messages.json"));

    array_push($old_records, $new_message);

    $data_to_save = $old_records;
}

if (!file_put_contents("Result_json/messages.json", json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)){
    
    $success = "Dados inseridos com sucesso!";
    
}else{

    $error = "Erro encontrado, tente novamente!!";
    
}

//Inserindo o json no banco

$json= json_encode($data_to_save);

$curl = curl_init();

curl_setopt_array($curl,[
    CURLOPT_URL=>"http://localhost/WebServiceInfo/Result_json/messages.json",
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $json,
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_POST=>true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json', 
        'Content-Length: '.strlen($json)
    ],
    CURLOPT_HEADER=>true,
    CURLOPT_RETURNTRANSFER=> true
    ]);
try {
   $response = curl_exec($curl);
    echo $response;
} catch (Exception $e) {
    echo $e;
}

}
