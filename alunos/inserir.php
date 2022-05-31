<?php 
    
    require_once "../src/funcoes-alunos.php";

    // Verificando se o botão do formulário foi acionado
    if(isset ($_POST['inserir'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $primeira = filter_input(INPUT_POST, 'primeira', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $segunda = filter_input(INPUT_POST, 'segunda', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        
        $media = calcMedia($primeira, $segunda);
        $situacao = calcSituacao($media);

        inserirAluno($conexao, $nome, $primeira, $segunda, $media, $situacao);

        // Redirecionamento
        header("location:visualizar.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>

<!-- css bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<!-- css próprio -->
<link href="../css/style.css" rel="stylesheet">

</head>
<body class="bg-light">
<main class="container">
	<h1 class="text-center p-4 text-info">Cadastrar um novo aluno</h1>
    <hr>
    		
    <h4 class="text-center p-4">Utilize o formulário abaixo para cadastrar um novo aluno.</h4>
    <div class="form">
        <form action="" method="post">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            
            <div>
                <label for="primeira">Primeira nota:</label>
                <input type="number" id="primeira" name="primeira" step="0.1" min="0.0" max="10" required>
            </div>
            
            <div>
                <label for="segunda">Segunda nota:</label>
                <input type="number" id="segunda" name="segunda" step="0.1" min="0.0" max="10" required>
            </div>
            
            <div>
                <button type="submit" name="inserir">Cadastrar aluno</button>
            </div>
        </form>
    </div>
    
    <hr>
    <p><a class="opcReturn text-decoration-none" href="../index.php">Voltar ao início</a></p>
</main>

</body>
</html>