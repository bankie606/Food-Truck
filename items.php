<?php
//items.php
$taxRate = 0.10;

$myItem = new Item(1,"Taco","Our Tacos are awesome!",1.95, 0.25);
$myItem->addExtra("Sour Cream");
$myItem->addExtra("Cheese");
$myItem->addExtra("Guacamole");
$items[] = $myItem;

$myItem = new Item(2,"Sundae","Our Sundaes are awesome!",3.95, 0.50);
$myItem->addExtra("Sprinkles");
$myItem->addExtra("Chocolate Sauce");
$myItem->addExtra("Nuts");
$items[] = $myItem;

$myItem = new Item(3,"Salad","Our Salads are awesome!",5.95, 0.75);
$myItem->addExtra("Croutons");
$myItem->addExtra("Bacon");
$myItem->addExtra("Lemon Wedges");
$myItem->addExtra("Avocado");
$items[] = $myItem;

$myItem = new Item(4, "Pizza", "Our pizzas are yummy!", 12.99, 0.75);
$myItem->addExtra("Cheese");
$myItem->addExtra("Sausage");
$myItem->addExtra("Pepperoni");
$myItem->addExtra("Olives");
$items[] = $myItem;


class Item
{
    public $ID = 0;
    public $Name = "";
    public $Description = "";
    public $Price = 0;
    public $Extras = array();
    public $ExtraPrice = 0.75;

    public function __construct($id, $name, $description, $price, $ExtraPrice)
    {
        $this->ID = (int)$id;
        $this->Name = $name;
        $this->Description = $description;
        $this->Price = number_format($price, 2);
        $this->ExtraPrice =number_format($ExtraPrice, 2);    
    }#end Item constructor

    #adds extra's item and price
    public function addExtra($extra)
    {
        $this->Extras[] = $extra;
    }#end addExtra()

}#end Item class

function getItem($id)
{
    global $items;
    
    foreach ($items as $item) 
    {
        if ($item->ID == $id) 
        {
            return $item;
        }
    }
    
    return null;
}

