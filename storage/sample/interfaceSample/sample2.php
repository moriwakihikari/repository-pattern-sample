<?php

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

    public function setNewPrice($price)
    {
        $this->price = $price;
    }
}

class Banana implements Fruits
{
    private $price = 100;

    public function getPrice(): int
    {
        return $this->price;
    }

    public function applyTax()
    {
        $taxRate = 0.1;
        $this->price += $this->price * $taxRate;
    }

    public function setNewPrice($price)
    {
        $this->price = $price;
    }
}

class Grape implements Fruits
{
    private $price = 500;

    public function getPrice(): int
    {
        return $this->price;
    }

    public function applyTax()
    {
        $taxRate = 0.1;
        $this->price += $this->price * $taxRate;
    }

    public function setNewPrice($price)
    {
        $this->price = $price;
    }
}

class Orange implements Fruits
{
    private $price = 300;

    public function getPrice(): int
    {
        return $this->price;
    }

    public function applyTax()
    {
        $taxRate = 0.1;
        $this->price += $this->price * $taxRate;
    }

    public function setNewPrice($price)
    {
        $this->price = $price;
    }
}

class Sample {
    public function getTaxIncludedNewPrice(Fruits $fruits, ?int $newPraice = null)
    {
        if (!is_null($newPraice)) {
            $fruits->setNewPrice($newPraice);
        }
        return $fruits->applyTax();
    }
}

// Sample クラスのオブジェクトを作成
$sample = new Sample();

// Apple オブジェクトを作成
$apple = new Apple();
$banana = new Banana();

// 新価格を設定
$newPraice = 300;

// メソッドを呼び出して価格を更新
$sample->getTaxIncludedNewPrice($apple, $newPraice);
$sample->getTaxIncludedNewPrice($banana);

// 更新後の価格を出力
var_dump($apple->getPrice(). '円');
var_dump($banana->getPrice(). '円');