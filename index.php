<?php
/**
 * index.php displays the form and results to the web user for
 * ordering menu items from the food truck.
 *
 *
 * @package Food Truck
 * @subpackage ITC250, SP17, Group 4
 * @author Vanessa Spillari <nessaspill@gmail.com>
 * @author Frankie Crescioni <frcrescioni@gmail.com>
 * @author Michael Archambault <michael.archambault@seattlecentral.edu>
 * @version 1.0 2017/05/04
 * @link http://www.frcrescioni.net/itc250/project2/index.php
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see items.php
 * @todo none
 */
include 'items.php';

if (isset($_REQUEST['action']))
    $myAction = trim($_REQUEST['action']);
else
    $myAction = "";
//this is my page
showHeader();
switch ($myAction) {
    case "display":
        showData();
        break;
    default:
        showForm();
}
showFooter();

/**
* This function is used to show the menu form for the user to
* select and order menu items and desired extras. It displays all the
* items contained in global $items in a list item form with
* number entry to select quantity to order along with checkboxes for
* choosing extras
*
* @todo none
*/
function showForm()
{
    global $items;
    echo '<form action="index.php" method="post">';
    foreach ($items as $item) {
        //create a text input in the form for each item.
        //name attribute is "item_[item->ID]"
        echo '<p>' .$item->Name . ' <input type="number" min="0" name="item_'  . $item->ID . '" /></p><b>ITEM PRICE: $'.$item->Price .' </b> EXTRAS PRICE: $'.$item->ExtraPrice .'<p>';

        $extraCounter = 0;
        foreach ($item->Extras as $extra) {
            //create a checkbox for each extra under the current item.
            //name attribute is "extra_[item->ID]_[0,1,2,3,...]""
            echo '<input type="checkbox" name="extra_' . $item->ID . '_' . $extraCounter . '"/>' . $extra . '   ';
            $extraCounter++;
        }
        echo '</p>';
    }

    //create submit button and hidden input
    echo '<p>
            <input type="submit" value="Submit">
         </p>
         <input type="hidden" name="action" value="display" />
         </form>';


} //end of showForm()

/**
* This function is used to show the results of the order to the user
* and the price, including subtotal, tax, and final price.
*
* @todo none
*/
function showData()
{
    $total = 0.00;
    $itemSelected = false;
    $totalItemsOrdered = 0;

    foreach($_POST as $name => $value)
    {//loop the form elements

        //if form name attribute starts with 'item_', process it
        if(substr($name,0,5)=='item_')
        {
            //explode the string into an array on the "_"
            $name_array = explode('_',$name);
            //id is the second element of the array
	    //forcibly cast to an int in the process
            $id = (int)$name_array[1];

            $item = getItem($id);
            //$extras = addExtras($extra);

            $quant = (int)$value;
            $totalItemsOrdered += $quant;
            $total += $quant * $item->Price;
            echo "<p>You ordered $quant {$item->Name}.</p>";

        }
        else if(substr($name,0,6)=='extra_')
        {
            //explode the string into an array on the "_"
            $name_array = explode('_',$name);
            //id is the second element of the array
	        //forcibly cast to an int in the process
            $id = (int)$name_array[1];
            $extraId = (int)$name_array[2];
            $item = getItem($id);
            //$extras = addExtras($extra);
            $extra = $item->Extras[$extraId];
	        $tops = (int)$value;
            //add the price of extra to the current item total
            $total += $item->ExtraPrice;

            echo "<p>With $extra.</p>";
        }

    }
    //adding tax and formatting number to decimal spots
    if ($totalItemsOrdered > 0) {
        $tax = $total * 0.10;
        setlocale(LC_MONETARY, 'en_US');
        $total = $total;
        echo "Sub total is $". number_format($total, 2)." <br>";


        $total += $tax;
        $total = $total;
        echo "Total tax is $". number_format($tax, 2).".<br>";
        echo "<p>Total is $". number_format($total, 2).".</p>";
    } else {
        echo "You didn't order any items!";
    }

    echo "";
}
function showHeader()
{
    include 'header_inc.php';#defaults to header_inc.php
}

function showFooter()
{
    include 'footer_inc.php'; #defaults to footer_inc.php
}
?>
