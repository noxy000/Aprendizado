<?php 
require_once 'Aluno.php';
class Tecnico extends Aluno {
    private $registroProfissional;

    public function praticar() {
        echo "Praticando...";
    }

    public function getRegistroProfissional() {
        return $this->registroProfissional;
    }

    public function setRegistroProfissional($registroProfissional) {
        $this->registroProfissional = $registroProfissional;
    }
}

?>