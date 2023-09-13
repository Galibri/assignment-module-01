<?php
$average = '';
$grade = '';
$error = '';
$feedback = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $test1 = $_POST['test1'];
    $test2 = $_POST['test2'];
    $test3 = $_POST['test3'];

    if (is_numeric($test1) && is_numeric($test2) && is_numeric($test3)) {
        if (($test1 >= 0 && $test1 <= 100) && ($test2 >= 0 && $test2 <= 100) && ($test3 >= 0 && $test3 <= 100)) {
            $average = ($test1 + $test2 + $test3) / 3;

            if ($test1 < 60 || $test2 < 60 || $test3 < 60) {
                $grade = "F";
                $feedback = "Failed because one or more individual scores are below 60.";
            } else {
                if ($average >= 90) {
                    $grade = "A";
                } elseif ($average >= 80) {
                    $grade = "B";
                } elseif ($average >= 70) {
                    $grade = "C";
                } elseif ($average >= 60) {
                    $grade = "D";
                } else {
                    $grade = "F";
                    $feedback = "Failed due to average score being below 60.";
                }
            }
        } else {
            $error = 'Please input scores between 0 and 100.';
        }
    } else {
        $error = 'Please input valid numbers.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
</head>
<body>
    <h2>Calcualte Grade</h2>
    <form method="post" action="grade_calculator.php">
        Test Score 1: <input type="text" name="test1" required><br><br>
        Test Score 2: <input type="text" name="test2" required><br><br>
        Test Score 3: <input type="text" name="test3" required><br><br>
        <button type="submit">Calculate</button><br><br>
    </form>

    <div>
        <?php
        if ($error) {
            echo "<p style='color: red;'>$error</p>";
        } else {
            if ($average !== '') {
                echo "Average Score: " . number_format($average, 2) . "<br>";
                echo "Grade: $grade<br>";
                if ($feedback) {
                    echo "Feedback: $feedback";
                }
            }
        }
        ?>
    </div>
</body>
</html>