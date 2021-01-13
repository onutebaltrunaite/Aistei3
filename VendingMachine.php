<?php

class VendingMachine
{
    private $products;

    public function __construct($item)
    {
        $this->products = $item;
    }

    public function returnProductsArr()
    {
        return $this->$products;
    }

    private function doesThisItemEgzists($code)
    {
        foreach($this->products as $product){
            if($product->getCode() === $code){
                return $product;
            } 
        } return false;
    }

    public function vend($codeArg, $moneyArg)
    {
        $item = $this->doesThisItemEgzists($codeArg);

        if(!$item){
            echo 'Invalid Selection';
        } elseif ($item->getAmount() >= 1 && $item->getPrice() < $moneyArg){
            echo $item->getName() . ' Nupirkta, pradinis kiekis YRA ' . $item->getAmount() .'<br>';
            $change = $moneyArg - $item->getPrice();
            $item->reduceAmount();
            echo 'Graza yra: ' . $change . 'LIKO ' . $item->getAmount() . '<br>'; 
        } elseif ($item->getPrice() > $moneyArg){
            echo 'Not enough money';
        } elseif($item->getAmount() < 1){
            echo 'Prekes baigesi';
        } elseif($item->getPrice() == $moneyArg && $item->getAmount() >= 1){
            echo $item->getName() . ' Nupirkta, YRA ' . $item->getAmount() .'<br>';
            $change = $moneyArg - $item->getPrice();
            $item->reduceAmount();
            echo 'Grazos nera; LIKO: ' . $item->getAmount() . '<br>'; 
        }
    }
}




?>