<?php
// Verifica o método da requisição
$method = $_SERVER['REQUEST_METHOD'];

// Endpoint GET
if ($method === 'GET') {
    // Lê o arquivo CSV e extrai os dados
    $csv_file = 'C:\xamppFront\htdocs\projeto_upload\public\img\contatos.csv'; // Substitua pelo caminho do seu arquivo CSV
    $csv_data = array_map('str_getcsv', file($csv_file));

    // Extrai os dados do CSV
    $dados = array(
        'nome' => $csv_data[0][1], // Supondo que a primeira linha do CSV contenha o nome
        'sobrenome' => $csv_data[0][2], // Supondo que a primeira linha do CSV contenha o sobrenome
        'email' => $csv_data[0][3], // Supondo que a primeira linha do CSV contenha o email
        'telefone' => $csv_data[0][4],,
        'endereco' => $csv_data[0][5],,
        'cidade' => $csv_data[0][6],,
        'cep' => $csv_data[0][7],,
        'data_nascimento' => $csv_data[0][8],
    );

    // Retorna os dados em formato JSON
    echo json_encode($dados);
}

// Endpoint POST
if ($method === 'POST') {
    // Obtém os dados enviados via POST
    $post_data = json_decode(file_get_contents('php://input'), true);

    // Verifica se os dados foram recebidos corretamente
    if (isset($post_data['campanha'])) {
        // Aqui você pode realizar o que for necessário com a campanha
        $campanha = $post_data['campanha'];

        // Retorna uma resposta de sucesso
        echo json_encode(array('success' => true, 'message' => 'Campanha recebida com sucesso: ' . $campanha));
    } else {
        // Retorna uma mensagem de erro se os dados não forem recebidos corretamente
        echo json_encode(array('success' => false, 'message' => 'Dados inválidos para a campanha'));
    }
}
?>