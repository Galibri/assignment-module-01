<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['number'];

    if (isset($number)) {
        if ($number % 2 == 0) {
            $message = "The number {$number} is even.";
        } else {
            $message = "The number {$number} is odd.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even or Odd Checker</title>
</head>
<body>
    <h2>Even or Odd Checker</h2>
    <form method="POST" action="even_odd_checker.php">
        Enter a number: <input type="number" name="number" step="1" required><br><br>
        <input type="submit" name="check" value="Check"><br><br>
    </form>

    <p><?php echo $message; ?></p>

</body>
</html>
