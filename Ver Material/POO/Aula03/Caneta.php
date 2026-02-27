<?php 

class Caneta { // Por padrão ao criar variáveis var, elas são públicas
    public $modelo;
    public $cor;
    private $ponta;
    protected $carga;
    protected $tampada;

    public function rabiscar() {
        if ($this->tampada == true) { // this se refere a própria classe no atributo tampada
            echo "<p>Erro, não posso rabiscar!</p>";
        } else {
            echo "<p>Estou rabiscando...</p>";        
        }
    }
    public function tampar() {
        $this->tampada = true; // dentro da class caneta, atributo tampada, recebe true no método tampar()
    }
    public function destampar() {
        $this->tampada = false;
    }
}

?>