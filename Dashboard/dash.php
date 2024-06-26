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
    <link rel="stylesheet" href="../Styles/styleDash.css">
    <link rel="stylesheet" href="../Styles/global.css">

</head>

<body>
    <div class="dashboard-container">
        <div class="menu">
            <div class="list">
                <img src="../public/img/logo.svg" alt="Bootstrap" width="250" height="50">
            </div>
            <ol class="menu-list">
                <li><a href="http://localhost/ASC/projeto_upload/Dashboard/dash.php">Dashboard</li><br></a>
                <li><a href="http://localhost/ASC/projeto_upload/uploadFiles/">Upload de campanha</li></a><br>
                <li><a href="http://localhost/ASC/projeto_upload/ListagemData/">Listagem de campanha</li><br></a>
            </ol>
        </div>
        <div class="content">
            <nav class="navbar bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="../public/img/logo.svg" alt="Bootstrap" width="250" height="50">
                    </a>
                </div>
            </nav>
            <section>
                <div>
                    <h1 class="title">Seja Bem Vindo!</h1>
                    <div class="imgDash">
                        <img alt="img dash" src="../public/img/dash.svg" width="1000">
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>