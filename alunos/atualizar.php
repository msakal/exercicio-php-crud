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
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<main class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <h4>Utilize o formulário abaixo para atualizar os dados do aluno.</h4>

    <div class="form">

        <form action="" method="post">
            
            <p><label for="nome">Nome:</label>
            <input value="<?=$aluno['nome']?>" type="text" name="nome" id="nome" required></p>
            
            <p><label for="primeira">Primeira nota:</label>
            <input value="<?=$aluno['primeira']?>" name="primeira" type="number" id="primeira" step="0.1" min="0.0" max="10" oninput="atualizaMedia()" required></p>
            
            <p><label for="segunda">Segunda nota:</label>
            <input value="<?=$aluno['segunda']?>" name="segunda" type="number" id="segunda" step="0.1" min="0.0" max="10" required></p>

            <!-- Campo somente leitura e desabilitado para edição.
            Usado apenas para exibição do valor da média -->
            
            <p>
                <label for="media">Média:</label>
                <input value="<?=$aluno['media']?>" name="media" type="number" id="media" step="0.1" min="0.0" max="10" readonly disabled>
            </p>

            <p>teste</p>
            <p id="result"></p>

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
    <p><a class="opcReturn" href="visualizar.php">Voltar à lista de alunos</a></p>
</main>


<!-- Atualização on-line (média e situação) -->
<script>

    function atualizaMedia() {
        let nt1 = document.getElementById('primeira').value;
        let nt2 = document.getElementById('segunda').value;
        nt1 = parseFloat(nt1);
        nt2 = parseFloat(nt2);
        
        // document.getElementById("media").innerHTML = (( nt1 + nt2 ) / 2);

        let resultado = ( (nt1 + nt2) / 2);
        document.getElementById('result').innerHTML = resultado;
        
    }

</script>

</body>
</html>