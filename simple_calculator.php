<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number1 = isset($_POST['number1']) ? $_POST['number1'] : null;
    $number2 = isset($_POST['number2']) ? $_POST['number2'] : null;
    $operation = isset($_POST['operation']) ? $_POST['operation'] : null;

    if (is_null($number1) || is_null($number2) || is_null($operation)) {
        $message = "Please complete all fields.";
    } else {
        if ($operation == 'add') {
            $result = $number1 + $number2;
        } elseif ($operation == 'subtract') {
            $result = $number1 - $number2;
        } elseif ($operation == 'multiply') {
            $result = $number1 * $number2;
        } elseif ($operation == 'divide') {
            if ($number2 != 0) {
                $result = $number1 / $number2;
            } else {
                $result = "Error(Cannot be divided by zero.)";
            }
        }
        $message = "The result is: $result";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>

<form method="POST">
    Enter first number: <input type="number" step="any" name="number1" required><br><br>
    Enter second number: <input type="number" step="any" name="number2" required><br><br>
    Select operation: 
    <select name="operation" required>
        <option value="add">Addition</option>
        <option value="subtract">Subtraction</option>
        <option value="multiply">Multiplication</option>
        <option value="divide">Division</option>
    </select><br><br>
    <input type="submit" value="Calculate">
</form>
<br>
<p><?php echo $message; ?></p>

</body>
</html>
