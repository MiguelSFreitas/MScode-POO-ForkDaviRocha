<?php

class Cliente {
    public int $id;
    public string $nome;
    public string $telefone;
    public string $cpf;
    public float $saldoDevedor;

    
    public function atualizarSaldo(float $valor): self 
    {
        $this->saldoDevedor += $valor;
        return $this;
    }
}