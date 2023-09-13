<?php
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $temperature = $_POST['temperature'];
    $direction = $_POST['direction'];
    
    if (isset($temperature) && is_numeric($temperature)) {
        if ($direction == 'c_to_f') {
            $converted_temperature = ($temperature * 9/5) + 32;
        } else {
            $converted_temperature = ($temperature - 32) * 5/9;
        }
        
        $message = "Converted Temperature: $converted_temperature";
    } else {
        $message = "Please enter a valid number for temperature.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Converter</title>
</head>
<body>

    <form method="POST" action="temperature_converter.php">
        Temperature: <input type="number" step="any" name="temperature"><br><br>
        Conversion Direction: 
        <select name="direction">
            <option value="c_to_f">Celsius to Fahrenheit</option>
            <option value="f_to_c">Fahrenheit to Celsius</option>
        </select>
        <br><br>
        <input type="submit" value="Convert">
    </form>

<?php 
if ($message) {
    echo "<p>$message</p>";
}
?>

</body>
</html>