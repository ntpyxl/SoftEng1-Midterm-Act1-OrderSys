<?php
date_default_timezone_set("Asia/Manila");

if(isset($_POST['orderButton'])){
	$food = $_POST['order'];
	$quantity = $_POST['foodQuantity'];
	$cash = $_POST['cash'];
    $date = date("m/d/y h:i:s a");
	
	$foodPrice = 0;
	
	switch($food){
		case 'burger':
			$foodPrice = 50;
			break;
		case 'fries':
			$foodPrice = 75;
			break;
		case 'steak':
			$foodPrice = 100;
			break;
	}
	
	$totalCost = $foodPrice * $quantity;
	$moneyChange = $cash - $totalCost;
    
    $missingCash = $moneyChange - $moneyChange - $moneyChange;
	
    $successHTML = <<<EOT
        <html>
            <head>
                <title>Act #1 - Order System</title>
                <style>
                    td {text-align: center; padding: 2px 8px;}
                </style>
            </head>
            <body>

                <div style="border-style: dotted; padding: 8px; width: 50%;">
                    <h1 style="text-align: center;">RECEIPT</h1>
                    <table style="text-align: left;">
                        <tr>
                            <th>Total price:</th>
                            <td>$totalCost</td>
                        </tr>
                        <tr>
                            <th>You paid:</th>
                            <td>$cash</td>
                        </tr>
                        <tr>
                            <th>YOUR CHANGE:</th>
                            <td>$moneyChange</td>
                        </tr>
                    </table>
                    <hr>
                    <h3><i>$date</i></h3>
                    <hr>
                    <h2 style="text-align: center;">THANK YOU FOR ORDERING!</h2>
                </div>
                <br>

                <input type="submit" value="ORDER AGAIN" name="reorderButton" onclick="location.href='index.html'">
            </body>
        </html>
    EOT;

    $failHTML = <<<EOT
        <html>
            <head>
                <title>Act #1 - Order System</title>
            </head>
            <body>
                <?php session_start(); ?>
                
                <div style="border-style: dotted; padding: 8px; width: 50%;">
                    <h2 style="text-align: center;"> 
                        Sorry! You do not have enough cash. <br>
                        You are missing $missingCash Pesos.
                    </h2>
                </div>
                <br>

                <input type="submit" value="ORDER AGAIN" name="reorderButton" onclick="location.href='index.html'">
            </body>
        </html>
    EOT;

	if($moneyChange >= 0){
        echo $successHTML;
	}else{
        echo $failHTML;
	}
}
?>