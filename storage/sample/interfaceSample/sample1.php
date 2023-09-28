<?php

// エラーファイル

interface Fruits
{
    public function getPrice(): int;
    public function applyTax();
    public function setNewPrice($price);
}

class Apple implements Fruits
{
    private $price = 200;

    public function getPrice(): int
    {
        return $this->price;
    }

    public function applyTax()
    {
        $taxRate = 0.1;
        $this->price += $this->price * $taxRate;
    }

    // public function setNewPrice($price)
    // {
    //     $this->price = $price;
    // }
}
