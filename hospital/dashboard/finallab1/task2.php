<?php

$amount = 1000; 


$vat_rate = 0.15; 

$vat = $amount * $vat_rate;


$total_amount = $amount + $vat;


echo "Original Amount: " . $amount . " units <br>";
echo "VAT (15%): " . $vat . " units <br>";
echo "Total Amount (Including VAT): " . $total_amount . " units <br>";
?>
