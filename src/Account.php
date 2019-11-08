<?php
namespace Bank;

class Account
{
    private $currentBalance;
    private $currentLimit;

    public function __construct()
    {
        $this->currentBalance = 0;
        $this->currentLimit = 100;
    }

    public function getCurrentBalance()
    {
        return $this->currentBalance;
    }

    public function getCurrentLimit()
    {
        return $this->currentLimit;
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
        if ($this->totalAmountFromAccount() < $amount) {
            throw new \Exception();
        }

        $this->currentBalance -= $amount;
        $this->currentLimit -= $amount;
    }

    private function totalAmountFromAccount()
    {
        return $this->currentBalance + $this->currentLimit;
    }
}
