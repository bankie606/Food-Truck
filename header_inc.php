<?php    
    //dynamic copyright  
    date_default_timezone_set('America/Los_Angeles');
    $yearofoperation = date("Y");
    ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<style>
body{
width:80%;
margin: auto;
float:none;    
}

div#header{
background-color: grey;
border-bottom: 4px solid #555;    
}

.content{
background: grey;    
float:none;
margin:auto 0;
text-align: center;    
}

    h1{
    color:antiquewhite;
    text-shadow: 1px 1px 1px #020, 2px 2px 3px #000, 1px 2px 1px #fff;
    text-align:right;
    }    
    
ul#menu{
    list-style:none;
    margin: auto;
    display: inline-flex;
    position:relative;
    padding: 1%;
    height: auto!important;
    overflow: visible!important;
    text-decoration: none;
    text-align: center;
    width:100%;
}

ul#menu li a{
    margin: 6px 0 0 10px;
    padding: 10px 15px 10px 15px;
    color:antiquewhite;
    text-shadow: 1px 1px 1px #020, 2px 2px 3px #000, 1px 2px 1px #fff;
    text-decoration: overline;

}

a #menu {
text-shadow: 1px 1px 1px #0f0, 2px 2px 3px #000, 1px 2px 1px #fff;
}


.mainbody{
float:none;
margin:auto;
    padding:20px;
 color: #0000D8;
  background: linear-gradient(to bottom,#505 42%, #CfCfCf 58%);
  background-size: auto 21px;
}


#footerbox{
margin:auto 0;
padding-top: 10px;    
text-align: center;      
width:100%;
border: 2px solid #555;
z-index: 100px;
background: grey;    
}


/* Responsive TABLET LAYOUT  */
           @media all and (max-width:780px) {
            body {
                    width:60%;
            }
    }
 /* Responsive PHONE LAYOUT  */
           @media all and (max-width:480px) {
            body {
                    width:80%;
            }
           
               div#header{
               width:50%;
               }
               
            ul#menu{
    list-style:none;
    margin: auto;
    display: inline-block;
    position:relative;
    padding: 12%;
    height: auto!important;
    overflow: visible!important;
    background-color: grey;
    border-bottom: 4px solid #032;
    text-decoration: none;
    text-align: center;    

}   
               
    }
</style>
    <body class="mainbody">
    
    <div id="header">
        <h1>FOOD TRUCK WEB SITE.COM</h1>
            <ul id="menu">
                <li><a href="https://github.com/bankie606/Food-Truck" target="_blank">GITHUB</a></li>
                <li><a href="#">Food Trucking</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li></li>
            </ul>
            
        </div>
    
<div class="content">
    
		<!-- end of header include file -->
    
    
