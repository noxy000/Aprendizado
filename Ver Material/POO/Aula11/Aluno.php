<?php 
require_once 'Pessoa.php';
/*final*/ class Aluno extends Pessoa { // Final não deixaria o Bolsista herdar de aluno
    private $matricula;
    private $curso;

    public /*final*/ function pagarMensalidade() { // Com final não deixaria ser sobreposto
        echo "<p>Pagando mensalidade do aluno <strong>$this->nome</strong></p>";
    } // Quando os atributos de Pessoa são protected aí dá pra chamar diretamente o atributo
    
    // Getters e Setters
    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }
}

?>