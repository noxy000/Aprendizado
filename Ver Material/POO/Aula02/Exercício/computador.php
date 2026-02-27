<?php 

class Caneta {
    var $modelo;
    var $cor;
    var $ponta;
    var $carga;
    var $tampada;

    function rabiscar() {
        if ($this->tampada == true) { // this se refere a própria classe no atributo tampada
            echo "<p>Erro, não posso rabiscar!</p>";
        } else {
            echo "<p>Estou rabiscando...</p>";        
        }
    }
    function tampar() {
        $this->tampada = true; // dentro da class caneta, atributo tampada, recebe true no método tampar()
    }
    function destampar() {
        $this->tampada = false;
    }
}

class Computador {
    var $placamãe;
    var $processador;
    var $fonte;
    var $funcionando;


    function ligar() {
        if ($this-> funcionando == true) {
            echo "<p>Computador ligado.</p>";
        } else {
            echo "<p>Não foi possível ligar, Computador quebrado :/</p>";
        }
    }

    function quebrado() {
        $this->funcionando = false;
    }

    function consertar() {
        $this->funcionando = true;
    }
}

?>