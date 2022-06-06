<?php 
    
    require_once "../src/funcoes-alunos.php";
    $listaDeAlunos = lerAlunos($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>

<!-- Paginação jQuery -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"> -->


<!-- css bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<!-- css próprio -->
<link rel="stylesheet" href="../css/style.css">


</head>

<body class="bg-light">
<div class="container">
    <h1 class="text-center p-4 text-info">Lista de alunos</h1>
    <hr>
    
    <h4 class="text-center p-3">Consulte a situação do aluno, Utilize o formulário abaixo para manutenção.</h4>

    <div class="alunos">
        <!-- <table class="table display" id="table_id"> -->
        <table class="table" id="table_id">
            <thead>
                <tr class="notas center">
                    <th rowspan=2>Nome do Aluno</th>
                    <th colspan=3>Notas</th>
                    <th rowspan=2>Situação</th>
                    <th colspan=2 rowspan=2></th>
                </tr>
                <tr>
                    <th>&nbsp;Primeira&nbsp;</th>
                    <th>&nbsp;Segunda&nbsp;</th>
                    <th>&nbsp;Média&nbsp;</th>
                </tr>

                <!-- <tr class="notas center">
                    <th>Nome do Aluno</th>
                    <th>Nota B1</th>
                    <th>Nota B2</th>
                    <th>Média</th>
                    <th>Situação</th>
                    <th></th>
                    <th></th>
                </tr> -->
            </thead>
            <tbody>
            <?php        
                foreach ($listaDeAlunos as $aluno) {
                    $cor = corDeFundo($aluno['media']);
            ?>
                    <tr class="<?=$cor?>">
                        <td class="fw-semibold"><?=$aluno['nome']?></td>
                        <td class="center"><?=$aluno['primeira']?></td>
                        <td class="center"><?=$aluno['segunda']?></td>
                        <td class="center fw-bold"><?=$aluno['media']?></td>
                        <td><?=$aluno['situacao']?></td>               
                        <td class="center">
                            <a class="atualizar fw-bold" href="atualizar.php?id=<?=$aluno['id']?>">Atualizar</a>
                        </td> 
                        <td class="center"> 
                            <a class="excluir fw-bold" href="excluir.php?id=<?=$aluno['id']?>">Excluir</a>
                        </td>             
                    </tr>
                <?php   
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <hr>
    
    <div>
        <p><a class="opcReturn text-decoration-none" href="inserir.php">Inserir novo aluno</a>
        <a class="opcReturn text-decoration-none" href="../index.php">Voltar ao início</a></p>
    </div>
</div>

    <script src="../src/excluir.js"></script>

    <!-- Paginação jQuery -->
    <!-- <script src="../plugins/jquery-1.12.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script> -->

</body>
</html>