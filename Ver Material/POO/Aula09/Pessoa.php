<?php 

class Pessoa {
    // Atributos
    private $nome;
    private $idade;
    private $sexo;

    public function fazerAniver() {
        
    }

    // Getters e Setters
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getIdade() {
        return $this->idade;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function getSexo() {
        return $this->sexo;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }
}

?>