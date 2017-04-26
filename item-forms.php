<?php
//item-forms.php

if (isset($_REQUEST['action']))
    $myAction = trim($_REQUEST['action']);
else
    $myAction = "";

switch ($myAction) {
    case "display":
        showData();
        break;
    default:
        showForm();
}

//show form since no action has been completed yet
function showForm()
{
    showHeader();

    global $items;
    echo '<form action="item-forms.php" method="post">';
    foreach ($items as $item) {
        //create a text input in the form for each item.
        //name attribute is "item_[item->ID]"
        echo '<p>' .$item->Name . ' <input type="text" name="item_' . $item->ID . '" /></p><p>';
        foreach ($item->Extras as $extra) {
            $extraCounter = 1;
            //create a checkbox for each extra under the current item.
            //name attribute is "extra_[item->ID]-[1,2,3,...]""
            echo '<input type="checkbox" name="extra_' . $item->ID . '-' . $extraCounter . '"/>' . $extra . '   ';
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

    showFooter();
} //end of showForm()

function showData()
{
    echo '<p>show data here</p>';
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
