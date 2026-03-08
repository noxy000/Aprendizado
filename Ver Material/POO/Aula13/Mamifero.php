<?php 
require_once 'Animaal.php';
class Mamifero extends Animaal {
    protected $corPelo;

    public function emitirSom()
    {
        echo "<p>Som de Mamífero</p>";
    }
}

?>