<?php 
require_once 'Pessoa.php';
class Aluno extends Pessoa {
    private $matricula;
    private $curso;

    public function pagarMensalidade() {

    }
    
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
    } // 9m 29s | aula 11b
}

?>