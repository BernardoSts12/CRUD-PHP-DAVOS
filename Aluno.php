<?php

class Aluno
{
    private $conn;

    public function __construct()
    {
        $host = "localhost:3306";
        $user = "root";
        $pass = "panda222";
        $dbname = "davos-tech";

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function cadastrarAluno($dados)
    {
        if (!empty($dados['cadastro_usuario'])) {
            $salvar_aluno = "INSERT INTO alunos (nome, email, situacao, telefone, mensalidade, senha, observacao) VALUES (
            '" . $dados['nome'] . "','" . $dados['email'] . "','" . $dados['situacao'] . "','" . $dados['telefone'] . "','" . $dados['mensalidade'] . "','" . $dados['senha'] . "','" . $dados['observacao'] . "')";

            $cadastrar_aluno = $this->conn->prepare($salvar_aluno);
            $cadastrar_aluno->execute();
        }
    }

    public function trazerAlunos(){
        $lista_alunos = $this->conn->query("SELECT * FROM alunos ORDER BY id DESC ")->fetchAll();
        return $lista_alunos;
    }

    public function deletarAluno($id)
    {
        try {
            $deletar_aluno = $this->conn->query("DELETE FROM alunos WHERE id =" . $id);
            $deletar_aluno->execute();
            header("Location: index.php");
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }
}
