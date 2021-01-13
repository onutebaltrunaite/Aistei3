<?php

class Item
{
    private $name;
    private $code;
    private $amount;
    private $price;

    public function __construct($argName, $argCode, $argAmount, $argPrice)
    {
        $this->name = $argName;
        $this->code = $argCode;
        $this->amount = $argAmount;
        $this->price = $argPrice;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function reduceAmount()
    {
        if($this->amount > 1) {
            $this->amount--;
        }
    }
}









?>