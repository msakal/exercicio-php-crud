<?php
    
    require_once "../src/funcoes-alunos.php";    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $aluno = lerUmAluno($conexao, $id);

    if(isset($_POST['atualizar-dados'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $primeira = filter_input(INPUT_POST, 'primeira', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $segunda = filter_input(INPUT_POST, 'segunda', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        
        $media = calcMedia($primeira, $segunda);
        $situacao = calcSituacao($media);

        atualizarAluno($conexao, $id, $nome, $primeira, $segunda, $media, $situacao);
    
        header("location:visualizar.php");
    }
  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>

<!-- css bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<!-- css próprio -->
<link href="../css/style.css" rel="stylesheet">

</head>
<body class="bg-light">
<main class="container">
    <h1 class="text-center p-4 text-info">Atualizar dados do aluno</h1>
    <hr>
    		
    <h4 class="text-center p-3">Utilize o formulário abaixo para atualizar os dados do aluno.</h4>

    <div class="form">

        <form action="" method="post">
            
            <p><label for="nome">Nome:</label>
            <input value="<?=$aluno['nome']?>" type="text" name="nome" id="nome" required></p>
            
            <p><label for="primeira">Primeira Nota:</label>
            <input value="<?=$aluno['primeira']?>" name="primeira" type="number" id="primeira" step="0.1" min="0.0" max="10" oninput="calcMedia()" required></p>
            
            <p><label for="segunda">Segunda Nota:</label>
            <input value="<?=$aluno['segunda']?>" name="segunda" type="number" id="segunda" step="0.1" min="0.0" max="10" oninput="calcMedia()"required></p>

            <!-- Campo somente leitura e desabilitado para edição.
            Usado apenas para exibição do valor da média -->
            <p>
                <label for="media">Média:</label>
                <input value="<?=$aluno['media']?>" name="media" type="number" id="media" step="0.1" min="0.0" max="10" readonly disabled>
            </p>

             <!-- Campo somente leitura e desabilitado para edição.
             Usado apenas para exibição do texto da situação -->
            <p>
                <label for="situacao">Situação:</label>
                <input value="<?=$aluno['situacao']?>" type="text" name="situacao" id="situacao" readonly disabled>
            </p>
            
            <button type="submit"  name="atualizar-dados">Atualizar dados do aluno</button>
        </form>    
    </div>

    <hr>
    <p><a class="opcReturn text-decoration-none" href="visualizar.php">Voltar à lista de alunos</a></p>
</main>


<!-- Atualização on-line (média e situação) -->
<script>

    function calcMedia() {
        let nt1 = document.getElementById('primeira').value;
        let nt2 = document.getElementById('segunda').value;
        nt1 = parseFloat(nt1);
        nt2 = parseFloat(nt2);
        let resultado = ( (nt1 + nt2) / 2).toFixed(1);
        document.getElementById('media').value = resultado;
        newSituacao = checkSituacao(resultado);
        document.getElementById('situacao').value = newSituacao;
    }

    function checkSituacao(resultado) {
        if (resultado >= 7) {
            newSituacao = `Aprovado`;
        } else { newSituacao = `Reprovado`; }
        return newSituacao;
    }

</script>

</body>
</html>