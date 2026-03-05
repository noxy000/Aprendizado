<?php

class Caneta
{
    public $modelo;
    public $cor;
    private $ponta;
    public $tampada;

    // Jeito Simples sem receber parâmetros
    /*public function __construct() // Método Construtor, pode ter nome __construct e Caneta
        {
            $this->cor = "Azul";
            $this->tampar();
        }*/

    //Quando fazemos desse jeito precisamos definir os valores na hora de criar o objeto
    public function __construct($m, $c, $p)
    {
        $this->modelo = $m;
        $this->cor = $c;
        $this->ponta = $p;
        $this->tampar();
    }

    public function tampar()
    {
        $this->tampada = true;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($m)
    {
        $this->modelo = $m;
    }

    public function getPonta()
    {
        return $this->ponta;
    }

    public function setPonta($p)
    {
        $this->ponta = $p;
    }
}
