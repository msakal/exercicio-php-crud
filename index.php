<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício CRUD com PHP e MySQL</title>

<!-- css bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- css próprio -->
<link href="css/style.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">
    <h1 class="text-center p-4 text-info">Exercício - CRUD com PHP e MySQL</h1>
    <hr>
    <h2 class="text-center p-3">Gerenciamento de alunos, notas, médias e aprovação/reprovação</h2>
    <hr>
    
    <div class="container mt-5">
        <div class="row text-center fs-3">
            <div class="col-5 bg-success p-5 text-dark bg-opacity-25 mt-5 rounded-4">
                <a class="text-secondary fw-semibold text-decoration-none" href="alunos/visualizar.php">Visualizar Alunos</a>
            </div>
            <div class="col-5 offset-2 bg-success p-5 text-dark bg-opacity-25 mt-5 rounded-4">
                <a class="text-secondary fw-semibold text-decoration-none" href="alunos/inserir.php">Inserir Novo Aluno</a>
            </div>
        </div>
    </div>

</div>
<br>

<!-- Footer -->
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <span class="mb-3 mb-md-0 text-muted px-2">&amp; 2022 Desenvolvido em Projeto de Aula (PHP/MySQL/BootStrap)</span>
    </div>
  </footer>
</div>

</body>
</html>