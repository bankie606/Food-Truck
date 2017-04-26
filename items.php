<?php
//foodtruck.php

//include 'index.php';

$myItem = new Item(1,"Taco","Our Tacos are awesome!",4.95);
$myItem->addExtra("Sour Cream");
$myItem->addExtra("Cheese");
$myItem->addExtra("Guacamole");
$items[] = $myItem;

$myItem = new Item(2,"Sundae","Our Sundaes are awesome!",3.95);
$myItem->addExtra("Sprinkles");
$myItem->addExtra("Chocolate Sauce");
$myItem->addExtra("Nuts");
$items[] = $myItem;

$myItem = new Item(3,"Salad","Our Salads are awesome!",5.95);
$myItem->addExtra("Croutons");
$myItem->addExtra("Bacon");
$myItem->addExtra("Lemon Wedges");
$myItem->addExtra("Avacado");
$items[] = $myItem;

$myItem = new Item(2, "Pizza", "Our pizzas are yummy!", 12.99);
$myItem->addExtra("Cheese");
$myItem->addExtra("Sausage");
$myItem->addExtra("Pepperoni");
$myItem->addExtra("Olives");
$items[] = $myItem;

// echo '<pre>';
// var_dump($items);
// echo '</pre>';

class Item
{
    public $ID = 0;
    public $Name = "";
    public $Description = "";
    public $Price = 0;
    public $Extras = array();

    public function __construct($id, $name, $description, $price)
    {
        $this->ID = (int)$id;
        $this->Name = $name;
        $this->Description = $description;
        $this->Price = (float)$price;

    }#end Item constructor

    #adds extra's item and price
    public function addExtra($extra)
    {
        //$this->Extras[$extra] = 0.25;
        $this->Extras[] = $extra;

    }#end addExtra()

}#end Item class

include 'item-forms.php';
