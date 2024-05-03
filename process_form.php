<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if 'numbers' key is set in the $_POST array
    if (isset($_POST["numbers"])) {
        // Retrieve form data
        $numbers = trim($_POST["numbers"]);
        $numbersArray = explode(",", $numbers);
        $count = count($numbersArray);

        // Basic validation
        if ($count <= 1) {
            echo "Must enter at least 2 numbers!!";
        } else if ($count > 10) {
            echo "Too many numbers to calculate!!";
        } else {
            // Display confirmation message
            $sum = array_sum($numbersArray);
            $min = min($numbersArray);
            $max = max($numbersArray);
            $mean = $sum / $count;

            sort($numbersArray);
            
            if ($count % 2 == 0) { 
                $firstIndex = $count / 2;
                $secondIndex = $firstIndex + 1;
                $mid = ($numbersArray[$firstIndex - 1] + $numbersArray[$secondIndex - 1]) / 2;
            } else {
                $index = floor($count / 2);
                $mid = $numbersArray[$index];
            }

            $frequency = array_count_values($numbersArray);
            arsort($frequency);
            $modes = array_keys($frequency);
            $mode = $modes[0];

            echo "Sum Of Numbers: " . $sum."<br />";
            echo "Max Of Numbers: " . $max."<br />";
            echo "Min Of Numbers: " . $min."<br />";
            echo "Mean Of Numbers: " . $mean."<br />";
            echo "Median Of Numbers: " . $mid."<br />";
            echo "Mode Of Numbers: " . $mode."<br />";
            echo "Total Numbers: " . $count."<br />";
        }
    } else {
        echo "Please enter valid input!";
    }
}
?>
