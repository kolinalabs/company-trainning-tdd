<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Bank\Account;

class AccountTest extends TestCase
{
    public function testInitialBalanceShouldBeEqualsToZero()
    {
        $account = new Account();
        $this->assertEquals(0, $account->getCurrentBalance());
    }

    public function testDepositShouldSumValueToCurrentBalance()
    {
        $account = new Account();
        $account->deposit(10);

        $this->assertEquals(10, $account->getCurrentBalance());
    }

    public function testDepositWhenReceiveAnAmountLessThanZeroShouldThrowAnInvalidException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $account = new Account();
        $account->deposit(-10);
    }

    public function testWithdrawShouldDecrementFromCurrentBalance()
    {
        $account = new Account();
        $account->deposit(500);
        $account->withdraw(400);

        $this->assertEquals(100, $account->getCurrentBalance());

    }

    public function testWithdrawWhenAmountGreaterCurrentBalanceShouldThrowAnException()
    {
        $this->expectException(\Exception::class);
        $account = new Account();
        $account->withdraw(100);
    }
}
