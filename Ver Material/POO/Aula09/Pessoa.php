<?php

class Pessoa
{
    // Atributos
    private $nome;
    private $idade;
    private $sexo;

    public function fazerAniver() {
        $this->idade ++;
        echo "Parabéns " . $this->getNome() . ", agora você tem " . $this->getIdade() . " anos!";
    }

    public function __construct($nome, $idade, $sexo) {
    $this->nome = $nome;    // $this->setNome($nome)
    $this->idade = $idade; // $this->setIdade($idade)
    $this->sexo = $sexo;  // $this->setSexo($sexo)
    }

    // Getters e Setters

    function getNome()
    {
        return $this->nome;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function getIdade()
    {
        return $this->idade;
    }

    function setIdade($idade)
    {
        $this->idade = $idade;
    }

    function getSexo()
    {
        return $this->sexo;
    }

    function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
}