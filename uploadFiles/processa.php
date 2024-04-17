<?php 

$arquivo = $_FILES['arquivo'];

if ($arquivo['type'] == "application/vnd.ms-excel") {
    $dados_arquivo = fopen($arquivo['tmp_name'], "r");
    $regexFixo = '/^\(\d{2}\)\s\d{4}-\d{4}$/';
    $regexMovel = '/^(\+\d{2})?(\d{2})?\d{4,5}9?\d{4}$/';
    $arrErro = array();
    $count = 2;

    while($linha = fgetcsv($dados_arquivo, 1000, ";")){
        if (isset($linha[3])) {
            if (!preg_match($regexMovel, $linha[3]) && !preg_match($regexFixo, $linha[3])) {
                $arrTempErro = array('Numero' => $linha[3], 'Linha' => $count);
                array_push($arrErro, $arrTempErro);
            }
        } else {
            $arrTempErro = array('Numero' => 'Está Vazio', 'Linha' => $count);
            array_push($arrErro, $arrTempErro);
        }
        $count++;
    }

    if (count($arrErro) > 0) {
        echo '<script>
                $(document).ready(function(){
                    $("#modalErro").modal("show");
                });
            </script>';
    } else {
        // inserção no banco de dados
    }

} else {
    echo "Necessário enviar um arquivo do tipo CSV";
    exit;
}
?>
