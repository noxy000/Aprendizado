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

?>