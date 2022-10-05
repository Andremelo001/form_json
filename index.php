<?php
require("inserir.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        /* ===== Google Font Import - Poppins ===== */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #4070f4;
        }

        .container {
            position: relative;
            max-width: 900px;
            width: 100%;
            border-radius: 6px;
            padding: 30px;
            margin: 0 15px;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .container header {
            position: relative;
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .container header::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            height: 3px;
            width: 80px;
            border-radius: 8px;
            background-color: #4070f4;
        }

        .container form {
            position: relative;
            margin-top: 16px;
            min-height: 490px;
            background-color: #fff;
            overflow: hidden;
        }

        .container form .form {
            position: absolute;
            background-color: #fff;
            transition: 0.3s ease;
        }

        .container form .form.second {
            opacity: 0;
            pointer-events: none;
            transform: translateX(100%);
        }

        form.secActive .form.second {
            opacity: 1;
            pointer-events: auto;
            transform: translateX(0);
        }

        form.secActive .form.first {
            opacity: 0;
            pointer-events: none;
            transform: translateX(-100%);
        }

        .container form .title {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 500;
            margin: 6px 0;
            color: #333;
        }

        .container form .fields {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        form .fields .input-field {
            display: flex;
            width: calc(100% / 3 - 15px);
            flex-direction: column;
            margin: 4px 0;
        }

        .input-field label {
            font-size: 12px;
            font-weight: 500;
            color: #2e2e2e;
        }

        .input-field input,
        select {
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            border-radius: 5px;
            border: 1px solid #aaa;
            padding: 0 15px;
            height: 42px;
            margin: 8px 0;
        }

        .input-field input :focus,
        .input-field select:focus {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
        }

        .input-field select,
        .input-field input[type="date"] {
            color: #707070;
        }

        .input-field input[type="date"]:valid {
            color: #333;
        }

        .container form button,
        .backBtn {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 45px;
            max-width: 200px;
            width: 100%;
            border: none;
            outline: none;
            color: #fff;
            border-radius: 5px;
            margin: 25px 0;
            background-color: #4070f4;
            transition: all 0.3s linear;
            cursor: pointer;
        }

        .container form .btnText {
            font-size: 14px;
            font-weight: 400;
        }

        form button:hover {
            background-color: #265df2;
        }

        form button i,
        form .backBtn i {
            margin: 0 6px;
        }

        form .backBtn i {
            transform: rotate(180deg);
        }

        form .buttons {
            display: flex;
            align-items: center;
        }

        form .buttons button,
        .backBtn {
            margin-right: 14px;
        }

        @media (max-width: 750px) {
            .container form {
                overflow-y: scroll;
            }

            .container form::-webkit-scrollbar {
                display: none;
            }

            form .fields .input-field {
                width: calc(100% / 2 - 15px);
            }
        }

        @media (max-width: 550px) {
            form .fields .input-field {
                width: 100%;
            }
        }
    </style>
    <title>Web Service</title>
</head>

<body>
    <div class="container">
        <header>Cadastrar Dados</header>

        <form action="" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Informações</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Descrição</label>
                            <input type="text" name="desc" required>
                        </div>

                        <div class="input-field">
                            <label>Tipo do Cliente</label>
                            <input type="text" name="client" required>
                        </div>

                        <div class="input-field">
                            <label>CPF</label>
                            <input type="text" name="cpf" placeholder="Digite seu CPF" required>
                        </div>

                        <div class="input-field">
                            <label>Inscrição Estadual</label>
                            <input type="text" name="inscricao" required>
                        </div>

                        <div class="input-field">
                            <label>CNPJ</label>
                            <input type="text" name="cnpj" placeholder="Digite seu CNPJ" required>
                        </div>

                        <div class="input-field">
                            <label>UF</label>
                            <input type="text" name="uf" required>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Informações Pessoais</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Cidade</label>
                            <input type="text" name="city" required>
                        </div>

                        <div class="input-field">
                            <label>Bairro</label>
                            <input type="text" name="bairro" required>
                        </div>

                        <div class="input-field">
                            <label>Endereço</label>
                            <input type="text" name="endereco" required>
                        </div>

                        <div class="input-field">
                            <label>CEP</label>
                            <input type="text" name="cep" required>
                        </div>

                        <div class="input-field">
                            <label>Número</label>
                            <input type="number" name="number" required>
                        </div>

                        <div class="input-field">
                            <label>Telefone</label>
                            <input type="number" name="tell" placeholder="Enter expiry date" required>
                        </div>
                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Próximo</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Mais Informações</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Celular</label>
                            <input type="text" name="cell" required>
                        </div>

                        <div class="input-field">
                            <label>Nome Fantasia</label>
                            <input type="text" name="fant" required>
                        </div>

                        <div class="input-field">
                            <label>OBS</label>
                            <input type="text" name="obs" required>
                        </div>

                        <div class="input-field">
                            <label>E-mail</label>
                            <input type="email" name="email" required>
                        </div>

                        <div class="input-field">
                            <label>Limite de Crédito</label>
                            <input type="text" name="limite" required>
                        </div>

                        <div class="input-field">
                            <label>Tipo de contribuinte</label>
                            <input type="text" name="contribuinte" required>
                        </div>
                    </div>
                </div>

                <div class="details family">
                    <span class="title">Family Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Data Cadastro</label>
                            <input type="date" name="data" required>
                        </div>

                        <div class="input-field">
                            <label>Status cliente</label>
                            <input type="text" name="status" required>
                        </div>

                        <div class="input-field">
                            <label>Data de vencimento</label>
                            <input type="date" name="vencimento" required>
                        </div>

                        <div class="input-field">
                            <label>Data de solicitação</label>
                            <input type="date" name="solicitacao" required>
                        </div>

                        <div class="input-field">
                            <label>Data de Prorrogação</label>
                            <input type="date" name="prorrogacao" required>
                        </div>

                        <div class="input-field">
                            <label>Chave de Prorrogação</label>
                            <input type="text" name="chave" required>
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Voltar</span>
                        </div>

                        <button class="sumbit" type="submit" name="submit">
                            <span class="btnText">Enviar</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>

            <p class="error"><?php echo @$error ?></p>
            <p class="success"><?php echo @$error ?></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        const form = document.querySelector("form"),
            nextBtn = form.querySelector(".nextBtn"),
            backBtn = form.querySelector(".backBtn"),
            allInput = form.querySelectorAll(".first input");


        nextBtn.addEventListener("click", () => {
            allInput.forEach(input => {
                if (input.value != "") {
                    form.classList.add('secActive');
                } else {
                    form.classList.remove('secActive');
                }
            })
        })

        backBtn.addEventListener("click", () => form.classList.remove('secActive'));
    </script>
</body>

</html>