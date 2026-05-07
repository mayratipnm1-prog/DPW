<?php
$x = 3;
$y = 20;

echo "Penambahan " . ($x + $y) . "<br>";
echo "Pengurangan " . ($x - $y) . "<br>";
echo "Perkalian " . ($x * $y) . "<br>";
echo "Pembagian " . ($x / $y) . "<br>";
echo "Modulus " . ($x % $y) . "<br>";
echo "Exponensial " . ($x ** $y) . "<br>";
echo("<br>");

$x += 2; 
$y *= 2; 
echo "Penambahan x " . $x . "<br>";
echo "Perkalian y " . $y . "<br>";
echo("<br>");

echo "Isi ++x = " . ++$x . "<br>"; 
echo "Isi x++ = " . $x++ . "<br>"; 
echo "Isi x = "  . $x   . "<br>"; 
echo("<br>");


echo "Isi --y = " . --$y . "<br>"; 
echo "Isi y-- = " . $y-- . "<br>"; 
echo "Isi y = "  . $y   . "<br>"; 
echo("<br>");

$user = "Mayra Ruhandini";
$status = (empty($user)) ? "Kosong" : "Ada isi yaitu $user ";
echo $status . "<br>";

$color = null;
echo $color = $color ?? "red";

?>
