<?php

class ContaBanco {

    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;

    //Métodos
    public function abrirConta($t) {
        $this->setTipo($t);
        $this->setStatus(true);
        if ($t == "CC") {
            $this->setSaldo(50);
        } elseif ($t == "CP") {
            $this->setSaldo(150);
        }
    }

    public function fecharConta() {
        if ($this->getSaldo() > 0) {
            echo "<p>Não é Possível fechar sua conta! Saldo disponível para saque, consulte sua conta!</p>";
        } elseif ($this->getSaldo() < 0) {
            echo "<p>Você está com débito, regularize suas contas!</p>";
        }
         elseif ($this->getSaldo() == 0) {
            echo "<p>Conta encerrada com sucesso!</p>";
        }
        else {
            $this->setStatus(false);
        }
    }

    public function depositar($v) {
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() + $v);
            echo "<p>Depósito de R$ $v na conta de ".$this->getDono()."</p>";
        } else {
            echo "<p>Conta encerrada. Impossível de realizar o deposíto!</p>";
        }
    }

    public function sacar($v) {
        if ($this->getStatus()) {
            if ($this -> getSaldo() >= $v) {
                $this->setSaldo($this->getSaldo() - $v);
                echo"<p>Saque de R$ $v autorizado na conta de ".$this->getDono()."</p>"; 
            } else {
                echo "<p>Saldo insuficiente para saque!</p>";
            }
        } else {
            "<p>Não posso sacar de uma conta fechada!</p>";
        }
    }
    

    public function pagarMensal() {
        if ($this->getTipo() == "CC") {
            $v = 12;
        } else if ($this->getTipo() == "CP") {
            $v = 20;
        }
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() - $v);
            echo "<p> Mensalidade de R$ $v debitada na conta de ".$this->getDono()."</p>";
        } else {
            echo "<p> Não posso debitar de uma conta zerada!</p>";
        }
    }

    public function __construct() {
        $this->setSaldo(0);
        $this -> setStatus(false);
        
        echo"<p>Conta criada com sucesso! </p>";
    }

    function getNumConta() {
        return $this->numConta;
    }

    function setNumConta($numConta) {
        $this->numConta = $numConta;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function getDono() {
        return $this->dono;
    }

    function setDono($dono) {
        $this->dono = $dono;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}
