<?php
//index.php
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

//show form since no action has been completed yet
function showForm()
{
    global $items;
    echo "<h2>Make your order</h2>";
    echo '<form action="index.php" method="post">';
    foreach ($items as $item) {
        //create a text input in the form for each item.
        //name attribute is "item_[item->ID]"
        echo '<p><b>' .$item->Name . '</b> <input type="number" min="0" name="item_'  . $item->ID . '" /></p><p>';
        $extraCounter = 0;
        foreach ($item->Extras as $extra) {
            //create a checkbox for each extra under the current item.
            //name attribute is "extra_[item->ID]_[0,1,2,3,...]""
            echo '<input type="checkbox" name="extra_' . $item->ID . '_' . $extraCounter . '"/>' . $extra . '   ';
            $extraCounter++;
        }
        echo '</p>';
    }
    echo '<p>* Each extra is $ 0.25.</p>';
    //create submit button and hidden input
    echo '<p>
            <input type="submit" value="Submit" id="submit">
         </p>
         <input type="hidden" name="action" value="display" />
         </form>';

    
} //end of showForm()

function showData()
{
    //create an array to store order
    $order = array();
        
    
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
            
            $quant = (int)$value;
            
            //applying data to the order array by id
            $order[$id] = array(
                "item" => $item->Name,
                "quant" => $quant,
                "price" => $item->Price,
                "extras" => array()
            );
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
            $extra = $item->Extras[$extraId];
			$tops = (int)$value;
            $order[$id]["extras"][] = $extra;
        }
    }//end foreach
    $total = 0;
    echo "<h2>Your order:</h2>";
    //loop to show the order
    foreach($order as $orderItem){
        if($orderItem['quant'] > 0)
        {
            echo "<p>{$orderItem['quant']} {$orderItem['item']}, $ {$orderItem['price']}</p>";
            echo "<p>Extras: " . implode($orderItem['extras'], ', ') . "</p>";
            $totalExtras = 0.25 * count($orderItem['extras']);
            $subTotal = $orderItem['quant'] * ($orderItem['price'] + $totalExtras);
            echo "<p>Subtotal: $ $subTotal</p>";
            echo "<hr>";
            $total += $subTotal;
        }
    }//end foreach
    echo "<h2>Your total is $ $total </h2>";
    
    
    
    /*echo '<pre style="text-align:left">';
    print_r($order);
    echo '</pre>';*/
}//end function showData()

function showHeader()
{
    include 'includes/header_inc.php';#defaults to header_inc.php
}

function showFooter()
{
    include 'includes/footer_inc.php'; #defaults to footer_inc.php
}
?>
