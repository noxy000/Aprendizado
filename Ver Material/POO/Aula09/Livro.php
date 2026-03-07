<?php 
require_once 'Pessoa.php';
require_once 'Publicacao.php';
class Livro implements Publicacao {
    private $titulo;
    private $autor;
    private $totPaginas;
    private $pagAtual;
    private $aberto;
    private $leitor;

public function __construct($ti, $au, $tot, $lei) {
    $this->titulo = $ti;      // $this->setTitulo($ti);
    $this->autor = $au;       // $this->setAutor($au);
    $this->totPaginas = $tot; // $this->setTotPaginas($tot);
    $this->leitor = $lei;     // $this->setLeitor($lei);
    $this->pagAtual = 0;      // $this->setPagAtual(0);
    $this->aberto = false;    // $this->setAberto(false);
}

public function detalhes() {
    echo "<hr>";
    echo "Livro: " . $this->titulo . "<br>";
    echo "Autor: " . $this->autor . "<br>";
    echo "Páginas: " . $this->totPaginas . " | Atual: " . $this->pagAtual . "<br>";
    echo "Sendo lido por: " . $this->leitor->getNome() . "<br>";
    echo "Aberto: " . ($this->aberto ? "Sim" : "Não") . "<br>";
  
    /*echo $this->getLeitor()->getNome() . " Está lendo o livro " . $this->getTitulo() . " com " . $this->getTotPaginas() . " páginas" . PHP_EOL . "Livro esse escrito por " . $this->getAutor() . " e nesse momento ta " . ($this->getAberto() ? "aberto" : "fechado, como que esse arrombado ta lendo então kk");*/
}

// Funcionalidades Implementadas

public function abrir() {
    $this->aberto = true;
    /*
    if ($this->getAberto()) {
        echo "Já tá aberto!";
    } else {
        $this->setAberto(true);
    }
    */
}

public function fechar() {
    $this->aberto = false;
    /*
    if ($this->getAberto() !== false) {
        $this->setAberto(false);
    } else {
        echo "Já está fechado!";
    }
    */
}

public function folhear($p) {
    if ($p>$this->totPaginas) {
        $this->pagAtual = 0;
    } else {
        $this->pagAtual = $p;
    }
    /*
    if (!$this->getAberto()) {
        echo "Erro: Você não pode folhear um livro que está fechado!";
    } elseif ($pagina > $this->getTotPaginas() || $pagina < 0) {
        echo "Erro: Essa página não existe.";
    } else {
        $this->setPagAtual($pagina);
    }
    */
}

public function avancarPag() {
    $this->pagAtual++; // $this->setPagAtual($this->getPagAtual() + 1)
}

public function voltarPag() {
    $this->pagAtual--; // $this->setPagAtual($this->getPagAtual() - 1)
}

// Getters e Setters

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getTotPaginas() {
        return $this->totPaginas;
    }

    public function setTotPaginas($totPaginas) {
        $this->totPaginas = $totPaginas;
    }

    public function getPagAtual() {
        return $this->pagAtual;
    }

    public function setPagAtual($pagAtual) {
        $this->pagAtual = $pagAtual;
    }

    public function getAberto() {
        return $this->aberto;
    }

    public function setAberto($aberto) {
        $this->aberto = $aberto;
    }

    public function getLeitor() {
        return $this->leitor;
    }

    public function setLeitor($leitor) {
        $this->leitor = $leitor;
    }
}
?>