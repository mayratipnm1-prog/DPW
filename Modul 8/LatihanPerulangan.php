<?php

echo "<h2>Pola Bintang Segitiga</h2>";
echo "<p>Dibawah ini adalah pola perulangan:</p>";

echo "<pre>";
for ($i = 1; $i <= 15; $i++) {
    echo str_repeat("* ", $i);
    echo "\n";
}
echo "</pre>";
?>