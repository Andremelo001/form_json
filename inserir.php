<?php

if(isset($_POST['submit'])){

$new_message = array(

    "desc" => $_POST['desc'],
    "client" => $_POST['client'],
    "cpf" => $_POST['cpf'],
    "inscricao" => $_POST['inscricao'],
    "uf" => $_POST['uf'],
    "cnpj" => $_POST['cnpj'],
    "city" => $_POST['city'],
    "bairro" => $_POST['bairro'],
    "endereco" => $_POST['endereco'],
    "cep" => $_POST['cep'],
    "number" => $_POST['number'],
    "cell" => $_POST['cell'],
    "fant" => $_POST['fant'],
    "obs" => $_POST['obs'],
    "email" => $_POST['email'],
    "limite" => $_POST['limite'],
    "contribuinte" => $_POST['contribuinte'],
    "data" => $_POST['data'],
    "status" => $_POST['status'],
    "vencimento" => $_POST['vencimento'],
    "solicitacao" => $_POST['solicitacao'],
    "prorrogacao" => $_POST['prorrogacao'],
    "chave" => $_POST['chave'],

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
    
    $json= json_encode($dados);

print_r($json);
$curl = curl_init();

curl_setopt_array($curl,[
    CURLOPT_URL=>"http://localhost/webserviceandre/Result_json/messages.json",
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

