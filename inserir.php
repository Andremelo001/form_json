<?php
//conecta com o banco
//usar PDO, mysqli é antigo e pode entrar em desuso
$mysqli = new mysqli('localhost', 'root', '', 'json_test');
if ($mysqli->connect_errno  != 0) {
    echo $mysqli->connect_error;
}

//convertendo os dados do form para json
if(isset($_POST['submit'])){

$new_message = array(

    "desc" => $_POST['desc'],
    "client" => $_POST['client'],
    "cpf" => $_POST['cpf'],
    "estadual" => $_POST['estadual'],
    "cnpj" => $_POST['cnpj'],
    "uf" => $_POST['uf'],
    "city" => $_POST['city'],
    "bairro" => $_POST['bairro'],
    "endereco" => $_POST['endereco'],
    "cep" => $_POST['cep'],
    "number" => $_POST['number'],
    "tell" => $_POST['tell'],
    "cell" => $_POST['cell'],
    "fantasy" => $_POST['fantasy'],
    "obs" => $_POST['obs'],
    "email" => $_POST['email'],
    "credito" => $_POST['credito'],
    "contribuinte" => $_POST['contribuinte'],
    "date_cadastro" => $_POST['date_cadastro'],
    "status" => $_POST['status'],
    "inativo" => $_POST['inativo'],
    "chave" => $_POST['chave'],
    "date_vencimento" => $_POST['date_vencimento'],
    "date_solicitacao" => $_POST['date_solicitacao'],
    "date_prorrogacao" => $_POST['date_prorrogacao'],
    "chave_prorrogacao" => $_POST['chave_prorrogacao'],
    "id_user" => $_POST['id_user'],
    //27

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
    "INSERT INTO teste (descricao, cliente, cpf, incricao_estadual, cnpj, uf, cidade, bairro, endereco, cep, numero, telefone, celular, nome_fantasia, obs, email, limite_credito, tipo_contribuinte, data_cadastro, status_cliente, inativo, chave, data_vencimento, data_solicitacao, data_prorrogacao, chave_prorrogacao, usuario_id) 
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
);
$stmt->bind_param("sssssssssssssssssssssssssss", $descricao, $cliente, $cpf, $estadual, $cnpj, $uf, $city, $bairro, $endereco, $cep, $number, $tell, $cell, $fantasy, $obs, $email, $credito, $contribuinte, $date_cadastro, $status, $inativo, $chave, $date_vencimento, $date_solicitacao, $date_prorrogacao, $chave_prorrogacao, $id_user);

//percorrendo os dados do json
$inserted_rows = 0;
foreach ($data_to_save as $data) {
    $descricao = $data["desc"];
    $cliente = $data["client"];
    $cpf = $data["cpf"];
    $estadual = $data["estadual"];
    $cnpj = $data["cnpj"];
    $uf = $data["uf"];
    $city = $data["city"];
    $bairro = $data["bairro"];
    $endereco = $data["endereco"];
    $cep = $data["cep"];
    $number = $data["number"];
    $tell = $data["tell"];
    $cell = $data["cell"];
    $fantasy = $data["fantasy"];
    $obs = $data["obs"];
    $email = $data["email"];
    $credito = $data["credito"];
    $contribuinte = $data["contribuinte"];
    $date_cadastro = $data["date_cadastro"];
    $status = $data["status"];
    $inativo = $data["inativo"];
    $chave = $data["chave"];
    $date_vencimento = $data["date_vencimento"];
    $date_solicitacao = $data["date_solicitacao"];
    $date_prorrogacao = $data["date_prorrogacao"];
    $chave_prorrogacao = $data["chave_prorrogacao"];
    $id_user = $data["id_user"];

    $stmt->execute();
    $inserted_rows ++;
}

if (count($data_to_save) == $inserted_rows) {
    echo "Dados inseridos com sucesso";
}else{
    echo "error";
}

}

//funciona, porém ele sobreescreve os dados anteriores, obs: é igual o de cima, só que  o código é menor kkkkkkkk :(
//percorrendo os dados do json;
/*foreach ((array)$data_to_save as $data) {
 
    $query = "INSERT INTO teste (descricao, cliente, cpf) VALUES ('".$data['desc']."', '".$data['client']."', '".$data['cpf']."')";

    mysqli_query($mysqli, $query);
}*/



//deve funcionar, porém eu não tenho a menor ideia de como fazer funciona
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

