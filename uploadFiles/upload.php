<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o arquivo foi enviado sem erros
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        // Define o diretório de destino onde o arquivo será salvo
        $targetDir = "uploads/";
        // Define o nome do arquivo
        $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
        // Verifica se o arquivo já existe
        if (file_exists($targetFile)) {
            echo "Desculpe, o arquivo já existe.";
        } else {
            // Move o arquivo enviado para o diretório de destino
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                echo "O arquivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " foi enviado com sucesso.";
            } else {
                echo "Desculpe, houve um erro ao enviar o arquivo.";
            }
        }
    } else {
        echo "Desculpe, ocorreu um erro ao enviar o arquivo.";
    }
}
?>
