<?php

class Usuario {
    private $pdo;

    // O construtor recebe a conexão que criamos lá no config.php
    public function __construct($conexao) {
        $this->pdo = $conexao;
    }

    // 1. BUSCAR TODOS OS DADOS (Para a nossa tabela)
    public function buscarDados() {
        $res = array();
        $sql = $this->pdo->query("SELECT * FROM usuarios ORDER BY nome ASC");
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // 2. CADASTRAR PESSOA (Com trava de e-mail duplicado)
    public function cadastrarPessoa($nome, $telefone, $email) {
        // Primeiro, verificamos se o email já existe
        $cmd = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();

        if ($cmd->rowCount() > 0) {
            return false; // Email já cadastrado
        } else {
            // Se não existe, a gente insere
            $cmd = $this->pdo->prepare("INSERT INTO usuarios (nome, telefone, email) VALUES (:n, :t, :e)");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":t", $telefone);
            $cmd->bindValue(":e", $email);
            $cmd->execute();
            return true;
        }
    }

    // 3. EXCLUIR PESSOA
    public function excluirPessoa($id) {
        $cmd = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }

    // 4. BUSCAR DADOS DE UMA PESSOA ESPECÍFICA (Para o modo Editar)
    public function buscarDadosPessoa($id) {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    // 5. ATUALIZAR DADOS
    public function atualizarDados($id, $nome, $telefone, $email) {
        $cmd = $this->pdo->prepare("UPDATE usuarios SET nome = :n, telefone = :t, email = :e WHERE id = :id");
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":t", $telefone);
        $cmd->bindValue(":e", $email);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }
}