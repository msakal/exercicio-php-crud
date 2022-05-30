<?php
require_once "conecta.php";

    // Ler Aluno
    function lerAlunos(PDO $conexao):array {
        $sql = "SELECT alunos.id,
                    alunos.nome,
                    alunos.primeira,
                    alunos.segunda,
                    alunos.media,
                    alunos.situacao 
        FROM alunos
        ORDER BY nome;";

        try {   
            $consulta = $conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

         } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
         }

         return $resultado;  
    };


    // Atualizar/Inserir Alunos
    function atualizarAluno(PDO $conexao, string $nome, float $primeira, int $segunda, string $media, int $situacao):void {
        $sql = "INSERT INTO alunos(nome, primeira, segunda, media, situacao) 
        VALUES(:nome, :primeira, :segunda, :media, :situacao)";

        try {   
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->bindParam(':primeira', $preco, PDO::PARAM_STR);
            $consulta->bindParam(':segunda', $quantidade, PDO::PARAM_STR);
            $consulta->bindParam(':media', $descricao, PDO::PARAM_STR);
            $consulta->bindParam(':situacao', $fabricante_id, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    };


    // Ler um Aluno
    function lerUmAluno(PDO $conexao, int $id):array {
        $sql = "SELECT nome, primeira, segunda, media, situacao FROM alunos
        WHERE id = :id"; 

        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
          
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    
        return $resultado;
    };


    // ATUALZIAÇÃO ,, Atualiziação de Aluno


    // EXCLUSÃO,, Excluindo um Aluno



    // Cálculo da Média
    function calcMedia($primeira, $segunda) {
        $media = ( ( $primeira + $segunda ) / 2 );
        
        return $media; 
    };

    // Retorna Situação (Aprovado/Reprovado)
    function calcSituacao($media) {  
        if ($media < 7 ) {
            $situacao = 'Reprovado';
        } else { $situacao = 'Aprovado'; }

        return $situacao;
    };

    ?>