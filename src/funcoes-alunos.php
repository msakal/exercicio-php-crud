<?php
    require_once "conecta.php";

    // LEITURA (LOOP),, Ler Aluno
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



    // INSERT,, Inserir Alunos
    function inserirAluno(PDO $conexao, string $nome, float $primeira, float $segunda, float $media, string $situacao):void {
        $sql = "INSERT INTO alunos(nome, primeira, segunda, media, situacao) 
        VALUES(:nome, :primeira, :segunda, :media, :situacao)";

        try {   
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->bindParam(':primeira', $primeira, PDO::PARAM_STR);
            $consulta->bindParam(':segunda', $segunda, PDO::PARAM_STR);
            $consulta->bindParam(':media', $media, PDO::PARAM_STR);
            $consulta->bindParam(':situacao', $situacao, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    };



    // LEITURA INDIVIDUAL,, Ler um Aluno
    function lerUmAluno(PDO $conexao, int $id):array {
        $sql = "SELECT id, nome, primeira, segunda, media, situacao FROM alunos
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



    // UPDATE ,, Atualização de Aluno
    function atualizarAluno(PDO $conexao, int $id, string $nome, float $primeira, float $segunda, float $media, string $situacao):void {
       
        $sql = "UPDATE alunos SET nome = :nome, primeira = :primeira, segunda = :segunda, media = :media, situacao = :situacao
        WHERE id = :id";
       
        try {   
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->bindParam(':primeira', $primeira, PDO::PARAM_STR);
            $consulta->bindParam(':segunda', $segunda, PDO::PARAM_STR);
            $consulta->bindParam(':media', $media, PDO::PARAM_STR);
            $consulta->bindParam(':situacao', $situacao, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    };



    // DELETE,, Excluindo um Aluno
    function excluirAluno(PDO $conexao, int $id):void {
        $sql = "DELETE FROM alunos WHERE id = :id";
    
        try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
    
        } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
        }
    
    };


    // Funções - Auxiliares
    // Cor de Fundo
    function corDeFundo($media) {
        if ($media >= 7) {
            // $cor = "corGreen";
            $cor = "rgb(205, 236, 205)";
        } else { 
            // $cor = "corRed"; 
            $cor = "rgb(250, 201, 201)"; 
        }

        return $cor;
    };

    // Cálculo da Média
    function calcMedia(float $primeira, float $segunda):float {
        $media = ( ( $primeira + $segunda ) / 2 );
        
        return $media;
    };

    // Retorna Situação (Aprovado/Reprovado)
    function calcSituacao(float $media):string {  
        if ($media < 7 ) {
            $situacao = 'Reprovado';
        } else { $situacao = 'Aprovado'; }

        return $situacao;
    };

  
    ?>