<?php
/**
 * items.php creates a set of items (e.g. Tacos, Sundaes, Salads)
 * and contains the class definitions for Item and the functions for
 * modifying and retrieving information about the Item objects.
 *
 *
 * @package Food Truck
 * @subpackage ITC250, SP17, Group 4
 * @author Vanessa Spillari <nessaspill@gmail.com>
 * @author Frankie Crescioni <frcrescioni@gmail.com>
 * @author Michael Archambault <michael.archambault@seattlecentral.edu>
 * @version 1.0 2017/05/04
 * @link http://www.frcrescioni.net/itc250/project2/items.php
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see index.php
 * @todo none
 */

//create 3 baseline items, along with extras for each item
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

/**
* Item class is used to construct and manipulate "Items" objects, which are menu items that are for sale.
*
* @todo none
*/

class Item
{
    public $ID = 0;
    public $Name = "";
    public $Description = "";
    public $Price = 0;
    public $Extras = array();
    public $ExtraPrice = 0.75;

    /**
     * This function is the constructor for the Items class.
     *
     * Use this to create and define attributes for each new Item object.
     *
     * @param integer $id Unique identifier for the Item
     * @param string $name Name of item, how it appears on the menu
     * @param string $description A general description of the item
     * @param float $price Selling price of the item, without tax
     * @param float $ExtraPrice Selling price of all the extras (e.g. toppings) associated with that Item
     * @todo none
     */

    public function __construct($id, $name, $description, $price, $ExtraPrice)
    {
        $this->ID = (int)$id;
        $this->Name = $name;
        $this->Description = $description;
        $this->Price = number_format($price, 2);
        $this->ExtraPrice =number_format($ExtraPrice, 2);

    }#end Item constructor

     /**
     * This function is used to add a single extra that can be added to * that item by the customer (e.g. sprinkles on ice cream). Adding * an extra adds it to the Item's Extras[] array.
     *
     * @param string $extra The name of the extra item.
     * @todo none
     */
    public function addExtra($extra)
    {
        $this->Extras[] = $extra;
    }#end addExtra()

}#end Item class


 /**
 * This function retrieves the name of the item based on its ID number
 *
 * @param integer $id The ID of the item to retrieve
 * @return string The name of the item
 * @todo none
 */
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
