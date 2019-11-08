<?php
namespace Bank;

class Account
{
    private $currentBalance;

    public function __construct()
    {
        $this->currentBalance = 0;
    }

    public function getCurrentBalance()
    {
        return $this->currentBalance;
    }

    public function deposit(float $amount)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException();
        }

        $this->currentBalance += $amount;
    }

    public function withdraw(float $amount)
    {
        if ($this->currentBalance < $amount) {
            throw new \Exception();
        }
        $this->currentBalance -= $amount;
    }
}
