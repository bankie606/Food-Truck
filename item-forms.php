<?php
//item-forms.php
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
    echo '<form action="item-forms.php" method="post">';
    foreach ($items as $item) {
        //create a text input in the form for each item.
        //name attribute is "item_[item->ID]"
        echo '<p>' .$item->Name . ' <input type="number" name="item_' . $item->ID . '" /></p><p>';
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

function showData()
{
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
            
			/*
				Here is where you'll do most of your work
				Use $id to loop your array of items and return 
				item data such as price.
				
				Consider creating a function to return a specific item 
				from your items array, for example:
				
				$thisItem = getItem($id);
				
				Use $value to determine the number of items ordered 
				and create subtotals, etc.
			*/
			
            $quant = (int)$value;
            $total = number_format($quant * $item->Price, 2);
            setlocale(LC_MONETARY, 'en_US');
            echo "<p>You ordered $quant {$item->Name} . Total is $ $total.</p>";
             
        }
        if(substr($name,0,6)=='extra_')
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
            
            echo "<p>With $extra.</p>";
            /*
				Here is where you'll do most of your work
				Use $id to loop your array of items and return 
				item data such as price.
				
				Consider creating a function to return a specific item 
				from your items array, for example:
				
				$thisItem = getItem($id);
				
				Use $value to determine the number of items ordered 
				and create subtotals, etc.
			
			*/
            
             
        }
        
    }
    //var_dump($_REQUEST);
    //"item_<id>" -> quantidade
    //"extra_id-index" -> sim ou nao
    // quais os ids dos items pedidos, e quanto de cada
    
    //echo '<p>show data here</p>';
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
