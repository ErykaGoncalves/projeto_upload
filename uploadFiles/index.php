<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard com Material-UI e HTML</title>
  <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-47uFmC5RMPezHMm+e1zJoqSgYTX4L9mK1ZuAox2lLx2C7TpH66mFqXbu+e1tyhYcAJK7eKc/sjGthN/5+MIlhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../Styles/styleUpload.css">
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
      <h1 class="title">Upload de Arquivo</h1>
      <form class="formUpdate" action="./processa.php" method="POST" enctype="multipart/form-data">
        <div class="areaUpload">
          <div class="icoActionUpdate">
            <img alt="upload" src="../img/ico-upload.svg" /><br>
            <div>
              <input class="inputUpload" type="file" name="fileToUpload" id="fileToUpload" accept=".csv">
            </div>
          </div>
        </div>
        <div class="alert alert-primary" role="alert">
          Informe o nome de sua campanha!
        </div>
        <input type="text" id="inputFilter" class="form-control mb-3" placeholder="Digite sua campanha">
        <input class="inputSendUpload" type="submit" value="Enviar Arquivo">
      </form>
    </div>
  </div>

  <div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="modalErroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalErroLabel">Erro no Envio do Arquivo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php foreach ($arrErro as $erro) : ?>
            <div class="alert alert-danger" role="alert">
              Número com erro: <?php echo $erro['Numero']; ?> - Linha: <?php echo $erro['Linha']; ?>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-pzD5VmkPd13L3Xy3TkPuahzLr9Qn3K+OzL6FwA5WWQNj5x6bXvcv1pPV5K9xkg1y" crossorigin="anonymous"></script>
  </body>

</html>