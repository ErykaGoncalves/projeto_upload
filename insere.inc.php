<?php

include 'conecta_mysql.inc.php';
$cadastro = include 'index.php';

$campanha = $_POST["campanha"];
$nome = $_GET["nome"];
$sobrenome = $_GET["sobrenome"];
$email = $_GET["email"];
$telefone = $_GET["telefone"];
$endereco = $_GET["endereco"];
$cidade = $_GET["cidade"];
$cep = $_GET["cep"];
$dataNascimento = $_GET["dataNascimento"];


$sql = "INSERT INTO usuarios VALUES";
$sql .= "('$campanha','$nome', '$sobrenome', '$email',  '$telefone', '$endereco', '$cidade' ,'$cep', '$dataNascimento')";

if ($conexao->query($sql) === TRUE) {
    $cadastro;
} else {
    echo "Erro: " . $sql;
}

$conexao->close();
?>