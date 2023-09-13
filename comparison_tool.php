<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number1 = isset($_POST['number1']) ? $_POST['number1'] : null;
    $number2 = isset($_POST['number2']) ? $_POST['number2'] : null;

    if (is_null($number1) || is_null($number2)) {
        $message = "Please enter both numbers.";
    } else {
        $message = ($number1 == $number2) ? "The numbers are equal." : (($number1 > $number2) ? "The larger number is: $number1" : "The larger number is: $number2");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Comparison Tool</title>
</head>
<body>
<h2>Check which number is larger</h2>
<form method="POST" action="comparison_tool.php">
    Enter first number: <input type="number" name="number1" required><br><br>
    Enter second number: <input type="number" name="number2" required><br><br>
    <input type="submit" value="Compare">
</form>
<br>
<p><?php echo $message; ?></p>

</body>
</html>
