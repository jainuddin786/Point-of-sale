<?php
   
    //Final total price
    $total = 0;
    
	$inputProducts='ABCDABAAA';
  //convert the input string into array
    $inputArray = str_split($inputProducts, 1);
	
    //convert the input array into array, which each item as key, and the number of item as value
    $counts = array_count_values($inputArray);
	
    //Building Product price array
    $products = array('A'=>array('1'=>2.00, '4'=>7.00), 'B'=>array('1'=>12.00), 'C'=>array('1'=>1.25, '6'=>6.00), 'D'=>array('1'=>0.15));
    foreach($counts as $code=>$amount) {
        echo "Code : " . $code . " - Amount : ".$amount."\n ";
		
		
        if(isset($products[$code]) && count($products[$code]) > 1) {
            $groupUnit = max(array_keys($products[$code]));
  
		    $subtotal = intval($amount / $groupUnit) * $products[$code][$groupUnit] + fmod($amount, $groupUnit) * $products[$code]['1'];
            $total += $subtotal; 
        }
        elseif (isset($products[$code])) {
            $subtotal = $amount * $products[$code]['1'];
            $total += $subtotal;
        }
        echo "Subtotal: " . $subtotal . "\n <br/>";
    }
    echo 'Final Total: $' . number_format($total, 2). "\n"; 
?>
