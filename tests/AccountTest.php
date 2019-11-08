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
        $account->withdraw(200);
    }

    public function testInitialLimitShouldBeEqualsToOneHundread()
    {
        $account = new Account();
        $this->assertEquals(100, $account->getCurrentLimit());
    }

    public function testWhenWithdrawIsGreaterThanCurrentBalanceShouldDiscountFromLimit()
    {
        $account = new Account();
        $account->withdraw(50);

        $this->assertEquals(-50, $account->getCurrentBalance());
        $this->assertEquals(50, $account->getCurrentLimit());
    }

    public function testShouldDiscountFromLimitOnlyTheValueThatLeftOfCurrentBalance()
    {
        $account = new Account();
        $account->deposit(20);

        $account->withdraw(70);

        $this->assertEquals(50, $account->getCurrentLimit());
        $this->assertEquals(-50, $account->getCurrentBalance());
    }
}
