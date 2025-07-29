<?php
class BankAccount
{
    private $balance = 0;
    public function deposit($amount)
    {
        $this->balance += $amount;
    }
    public function withd($amount)
    {
        $this->balance -= $amount;
    }
    public function getBalance()
    {
        return $this->balance;
    }
}
$account = new BankAccount();
$account->deposit(1000);
echo $account->getBalance();
$account->withd(200);
echo $account->getBalance();


