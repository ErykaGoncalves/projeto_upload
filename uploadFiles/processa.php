<?php 

$arquivo = $_FILES['fileToUpload'];

// echo "<pre>";
// print_r($arquivo);
// exit;

if ($arquivo['type'] == "text/csv") {
    $dados_arquivo = fopen($arquivo['tmp_name'], "r");
    $regex = '/^(?:(?:\+|00)?(55)\s?)?(?:(?:0?[1-9][0-9])?\s?)?(?:9\d{4}-?\d{4}|(?:[2-9]|([2-9][0-9]))\d{3}-?\d{4})$/';
    $arrErro = array();
    $count = 2;
    $numeroVazios = 0;
    $numerosErrados = 0;

    while($linha = fgetcsv($dados_arquivo, 1000, ";")){

        if (!isset($linha[3]) || isset($linha[3]) && !$linha[3]) {
            // $arrTempErro = array('Numero' => 'Está Vazio', 'Linha' => $count);
            // array_push($arrErro, $arrTempErro);
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
            }
        }
        $count++;
    }

    // echo "<pre>";
    // print_r($arrErro);
    // exit;

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
