<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard com Material-UI e HTML</title>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-47uFmC5RMPezHMm+e1zJoqSgYTX4L9mK1ZuAox2lLx2C7TpH66mFqXbu+e1tyhYcAJK7eKc/sjGthN/5+MIlhA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <li><a href="http://127.0.0.1:5500/Dashboard/dash.php">Dashboard</a></li><br>
                <li><a href="http://127.0.0.1:5500/uploadFiles/index.php">Upload de campanha</a></li><br>
                <li><a href="http://127.0.0.1:5500/ListagemData/index.php">Listagem de campanha</a></li><br>
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
            <div class="alert alert-primary" role="alert">
                Informe o nome de sua campanha!
            </div>
            <div class="container">
                <select id="selectCampanha" class="form-select" aria-label="Default select example">
                    <option selected>Selecione a campanha</option>
                    <option value="Gás">Gás</option>
                    <option value="Maquiagem">Maquiagem</option>
                    <option value="Mercado grátis">Mercado grátis</option>
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
                        <tr>
                            <th scope="row">Gás</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td><td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">Maquiagem</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mercado grátis</th>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>Larry the Bird</td>
                            <td>Larry the Bird</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('selectCampanha').addEventListener('change', function () {
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
