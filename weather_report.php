<?php
$temperature = 15; // Change this value to test different temperatures

if ($temperature <= 0) {
    echo "It's freezing!";
} elseif ($temperature > 0 && $temperature <= 20) {
    echo "It's cool.";
} else {
    echo "It's warm.";
}
?>