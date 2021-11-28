<?php 
//1-3.

class Customer {

    public $customerId;
    public $login;
    public $email;
    public $address;
    public $discount;

    public function research();
    public function addToShoppingCart();
    public function correctShoppingCart();
    public function checkout();
}

class Manager {

    public $managerId;
    public $login;

    public function addProduct();
    public function checkOrder();
}

class Category {

    public $categoryName;

}

class Product extends Category{

    public $productId;
    public $data;
    public $image;

}

class ShoppingCart {

    public $orderId;
    public $items;
}

class Order extends ShoppingCart {

    public $orederTotal;
    public $cardDetails;
}

//4.
class Hello 
{
    public function test() {
        static $x = 0;
        echo ++$x;
    }
}

$a1 = new Hello();
$a2 = new Hello();

$a1->test();
$a2->test();
$a1->test();
$a2->test();

/*
Результат: 1,2,3,4
Для обеих переменных используется метод одного и того же класса. В public function test() используется статическая переменная $x,
в которой значение накапливается. Перед выводом значения перменной, мы увеличиваем его на 1, поэтому первое значение = 1.
*/


//5.
class newHello 
{
    public function test() {
        static $x = 0;
        echo ++$x;
    }
}

Class Otus extends newHello 
{
}

$a = new newHello();
$b = new Otus();

$a->test();
$b->test();
$a->test();
$b->test();

/*
Результат: 1,1,2,2
Для переменных a и b используются методоты разных классов. Класс Otus наследует метод public function test(), но статическая переменная $x 
инициализируется в каждом классе. Таким образом есть две переменные $x, относящиеся к разным классам и накапливающие в себе значение 
независимо друг от друга. 
*/