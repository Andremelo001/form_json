<?php
//conectar com o banco
$mysqli = new mysqli('localhost', 'root', '', 'json_test');
if ($mysqli->connect_errno  != 0) {
    echo $mysqli->connect_error;
}

//convertendo os dados do form para json
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

    $old_records = json_decode(file_get_contents("Result_json/messages.json"), JSON_OBJECT_AS_ARRAY);

    array_push($old_records, $new_message);

    $data_to_save = $old_records;
}

if (!file_put_contents("Result_json/messages.json", json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)){
    
    $success = "Dados inseridos com sucesso!";
    
}else{

    $error = "Erro encontrado, tente novamente!!";
    
}

//inserindo o json no banco
$stmt = $mysqli->prepare
(
    "INSERT INTO teste (descricao, cliente, cpf) 
     VALUES (?,?,?)"
);
$stmt->bind_param("ssdi", $descricao, $cliente, $cpf);


//percorrendo os dados do json
$inserted_rows = 0;
foreach ((array)$data_to_save as $old) {
    $descricao = $old["descricao"];
    $cliente = $old["cliente"];
    $cpf = $old["cpf"];

    $stmt->execute();
    $inserted_rows ++;
}

if (count($data_to_save) == $inserted_rows) {
    echo "success";
}else{
    echo "error";
}

}


//Inserindo o json no banco

/*$json= json_encode($data_to_save);

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
   $consulta = "INSERT INTO teste (descricao,cliente,cpf) VALUES ('$response');";
} catch (Exception $e) {
    echo $e;
}*/
