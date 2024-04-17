<?php
// $errorMsg = "";
// $successMsg = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
//         $fileExtension = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
//         if($fileExtension != "csv") {
//             $errorMsg = "Desculpe, apenas arquivos CSV são permitidos.";
//         } else {
//             $targetDir = "uploads/";
//             $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
//             if (file_exists($targetFile)) {
//                 $errorMsg = "Desculpe, o arquivo já existe.";
//             } else {
//                 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
//                     $successMsg = "O arquivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " foi enviado com sucesso.";
//                 } else {
//                     $errorMsg = "Desculpe, houve um erro ao enviar o arquivo.";
//                 }
//             }
//         }
//     } else {
//         $errorMsg = "Desculpe, ocorreu um erro ao enviar o arquivo.";
//     }

echo "estou auqi";
exit;

?>
