<!DOCTYPE html>
<html lang="en">

<head>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-47uFmC5RMPezHMm+e1zJoqSgYTX4L9mK1ZuAox2lLx2C7TpH66mFqXbu+e1tyhYcAJK7eKc/sjGthN/5+MIlhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/styleUpload.css">
    <link rel="stylesheet" href="../Styles/global.css">
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $arquivo = $_FILES['fileToUpload'];

        if ($arquivo['type'] == "text/csv") {
            $dados_arquivo = fopen($arquivo['tmp_name'], "r");
            $regex = '/^(?:(?:\+|00)?(55)\s?)?(?:(?:0?[1-9][0-9])?\s?)?(?:9\d{4}-?\d{4}|(?:[2-9]|([2-9][0-9]))\d{3}-?\d{4})$/';
            $arrErro = array();
            $count = 2;
            $numeroVazios = 0;
            $numerosErrados = 0;

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "banco_asc";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            $sql = "INSERT INTO usuarios (campanha, nome, sobrenome, email, telefone, endereco, cidade, cep, dataNascimento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                die("Preparação da consulta falhou: " . $conn->error);
            }

            while ($linha = fgetcsv($dados_arquivo, 1000, ";")) {

                if (!isset($linha[3]) || isset($linha[3]) && !$linha[3]) {
                    $numeroVazios++;
                } else {

                    $numeroSemEs = str_replace(" ", "", $linha[3]);
                    $numeroSemPara = str_replace("(", "", $numeroSemEs);
                    $numeroSemPara1 = str_replace(")", "", $numeroSemPara);
                    $numeroFormatado = str_replace("-", "", $numeroSemPara1);

                    if (!preg_match($regex, $numeroFormatado)) {
                        $arrTempErro = array('Numero' => $linha[3], 'Linha' => $count);
                        array_push($arrErro, $arrTempErro);
                        $numerosErrados++;
                    } else {
                        $campanha = $_POST['inputFilter'];
                        $nome = $linha[0];
                        $sobrenome = $linha[1];
                        $email = $linha[2];
                        $telefone = $numeroFormatado;
                        $endereco = $linha[4];
                        $cidade = $linha[5];
                        $cep = $linha[6];
                        $dataNascimento = $linha[7];

                        $stmt->bind_param("sssssssss", $campanha, $nome, $sobrenome, $email, $telefone, $endereco, $cidade, $cep, $dataNascimento);
                        $stmt->execute();
                    }
                }
                $count++;
            }


            if ($arrErro > 0) {
                echo '<div class="alert alert-danger" role="alert">';
                echo '<strong>Erros encontrados:</strong><br>';
                foreach ($arrErro as $erro) {
                    echo 'Número com erro: ' . $erro['Numero'] . ' - Linha: ' . $erro['Linha'] . '<br>';
                }
                echo '</div>';
            } else {
                echo "Dados salvos com sucesso!";
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Necessário enviar um arquivo do tipo CSV</div>';
            exit;
        }

            $stmt->close();
            $conn->close();

            if (count($arrErro) > 0) {
                echo '<div class="alert alert-danger" role="alert">';
                echo '<strong>Erros encontrados:</strong><br>';
                foreach ($arrErro as $erro) {
                    echo 'Número com erro: ' . $erro['Numero'] . ' - Linha: ' . $erro['Linha'] . '<br>';
                }
                echo '</div>';
            } else {
                echo "Dados salvos com sucesso!";
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Necessário enviar um arquivo do tipo CSV</div>';
            exit;
        }
    ?>

</body>

</html>