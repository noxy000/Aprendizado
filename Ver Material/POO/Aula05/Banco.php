<?php

class Banco
{
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;

    public function __construct()
    {
        $this->setSaldo(0);
        $this->setStatus(false);
        echo "<p>Conta criada com sucesso!</p>";
    }

    public function abrirConta($t)
    {
        $this->setTipo($t);
        $this->setStatus(true);
        if ($t == "CC") { // Conta corrente
            $this->setSaldo(50);
        } else if ($t == "CP") { // Conta poupança
            $this->saldo = 150;
        }
    }

    public function fecharConta()
    {
        if ($this->getSaldo() > 0) {
            echo ("<p>Conta com dinheiro, não foi possível fechar.</p>");
        } else if ($this->getSaldo() < 0) {
            echo ("<p>Conta em débito, pague suas dívidas antes de fechar.</p>");
        } else {
            $this->setStatus(false);
            echo "<p>Conta de " . $this->getDono() . " fechada com sucesso!</p>";
        }
    }

    public function depositar($v)
    {
        if ($this->getStatus()) { // Nem precisa testar se é verdadeiro == true
            $this->setSaldo($this->getSaldo() + $v); // $this->setSaldo($this->getSaldo() + $v)
            echo "<p>Deposito de $v na conta de " . $this->getDono() . "</p>";
        } else {
            echo "<p>Impossível depositar!</p>";
        }
    }

    public function sacar($v)
    {
        if ($this->getStatus()) {
            if ($this->getSaldo() >= $v) {
                $this->setSaldo($this->getSaldo() - $v);
                echo "<p>Saque de $v autorizado na conta de {$this->getDono()}, valor na conta agora: R$ " . $this->getSaldo() . "</p>"; // Necessário concatenar pra não aparecer object
            } else {
                echo "<p>Saldo insuficiente para saque!</p>";
            }
        } else {
            echo "<p>Não posso sacar de uma conta fechada!</p>";
        }
    }

    public function pagarMensal()
    {
        $v = 0;
        if ($this->getTipo() == "CC") {
            $v = 12;
        } else if ($this->getTipo() == "CP") {
            $v = 20;
        }

        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() - $v);
            echo "Mensalidade de R$ $v debitada da conta de " . $this->getDono() . "</p>";
        } else {
            echo "Impossível cobrar: conta fechada!";
        }
    }

    public function getNumConta()
    {
        return $this->numConta;
    }

    public function setNumConta($n)
    {
        $this->numConta = $n;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($t)
    {
        $this->tipo = $t;
    }

    public function getDono()
    {
        return $this->dono;
    }

    public function setDono($d)
    {
        $this->dono = $d;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function setSaldo($s)
    {
        $this->saldo = $s;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($s)
    {
        $this->status = $s;
    }
}
