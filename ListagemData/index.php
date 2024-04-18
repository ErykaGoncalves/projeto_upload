<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de dados</title>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-47uFmC5RMPezHMm+e1zJoqSgYTX4L9mK1ZuAox2lLx2C7TpH66mFqXbu+e1tyhYcAJK7eKc/sjGthN/5+MIlhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/styleList.css">
    <link rel="stylesheet" href="../Styles/global.css">
</head>

<body>
    <div class="dashboard-container">
        <div class="menu">
            <div class="list">
                <img src="../img/logo.svg" alt="Bootstrap" width="250" height="50">
            </div>
            <ol class="menu-list">
                <li><a href="http://localhost/projeto_upload/Dashboard/dash.php">Dashboard</li><br></a>
                <li><a href="http://localhost/projeto_upload/uploadFiles/">Upload de campanha</li></a><br>
                <li><a href="http://localhost/projeto_upload/ListagemData/">Listagem de campanha</li><br></a>
            </ol>
        </div>
        <div class="content">
            <nav class="navbar bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="../img/logo.svg" alt="Bootstrap" width="250" height="50">
                    </a>
                </div>
            </nav>
            <h1 class="title">Listagem de dados</h1>
            <div class="container">
                <select id="selectCampanha" class="form-select" aria-label="Default select example">
                    <option selected>Selecione a campanha</option>
                    <?php
                    // Realiza a conexão com o banco de dados
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "banco_asc";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verifica se a conexão foi bem sucedida
                    if ($conn->connect_error) {
                        die("Conexão falhou: " . $conn->connect_error);
                    }

                    // Query para selecionar os valores distintos da coluna 'campanha' na tabela usuarios
                    $sql = "SELECT DISTINCT campanha FROM usuarios";
                    $result = $conn->query($sql);

                    // Verifica se existem registros retornados pela consulta
                    if ($result->num_rows > 0) {
                        // Exibe cada valor da coluna 'campanha' como uma opção no select
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["campanha"] . "'>" . $row["campanha"] . "</option>";
                        }
                    } else {
                        echo "<option value='' disabled>Nenhuma campanha encontrada</option>";
                    }
                    // Fecha a conexão com o banco de dados
                    $conn->close();
                    ?>
                </select>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Campanha</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Cep</th>
                            <th scope="col">Data de nascimento</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php
                        // Realiza a conexão com o banco de dados
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "banco_asc";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Verifica se a conexão foi bem sucedida
                        if ($conn->connect_error) {
                            die("Conexão falhou: " . $conn->connect_error);
                        }

                        // Query para selecionar todos os registros da tabela usuarios
                        $sql = "SELECT * FROM usuarios";
                        $result = $conn->query($sql);

                        // Verifica se existem registros retornados pela consulta
                        if ($result->num_rows > 0) {
                            // Exibe cada linha de dados na tabela
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["campanha"] . "</td>";
                                echo "<td>" . $row["nome"] . "</td>";
                                echo "<td>" . $row["sobrenome"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["telefone"] . "</td>";
                                echo "<td>" . $row["endereco"] . "</td>";
                                echo "<td>" . $row["cidade"] . "</td>";
                                echo "<td>" . $row["cep"] . "</td>";
                                echo "<td>" . $row["dataNascimento"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>Nenhum dado encontrado</td></tr>";
                        }
                        // Fecha a conexão com o banco de dados
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('selectCampanha').addEventListener('change', function() {
            const selectedValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');

            rows.forEach(row => {
                const rowText = row.firstElementChild.textContent.toLowerCase();
                if (rowText.includes(selectedValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>