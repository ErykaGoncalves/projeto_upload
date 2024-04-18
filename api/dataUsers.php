<?php
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $csv_file = 'http://localhost/projeto_upload/public/img/contatos.csv';

    $csv_data = array_map('str_getcsv', file($csv_file));

    $csv_header = $csv_data[0];
    $dados = array();

    for ($i = 1; $i < count($csv_data); $i++) {
        $csv_values = $csv_data[$i];

        $linha = array();

        foreach ($csv_header as $index => $header) {
            if (isset($csv_values[$index])) {
                $valores = explode(';', $csv_values[$index]);

                foreach ($valores as $key => $valor) {
                    $linha[$key] = $valor;
                }
            } else {
                $linha[$key] = '';
            }
        }
        $dados[] = $linha;
    }

    http_response_code(200);

    header('Content-Type: application/json');

    $response = array(
        'status_code' => 200,
        'msg' => 'deu tudo certo',
        'result' => $dados
    );

    echo json_encode($response, JSON_PRETTY_PRINT);

    echo '<pre>';
    print_r($dados);
    echo '<pre>';
}
?>
