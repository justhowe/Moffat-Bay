<?php
function generate_calendar($inputName) {
    $month = isset($_GET['month']) ? $_GET['month'] : date('n');
    $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

    $firstDay = strtotime("first day of $year-$month");
    $lastDay = strtotime("last day of $year-$month");

    echo '<table class="calendar">';
    echo '<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>';

    // Loop through each day of the month
    for ($day = 1; $day <= date('t', $firstDay); $day++) {
        $currentDate = strtotime("$year-$month-$day");

        // Start a new row at the beginning of each week
        if (date('w', $currentDate) == 0) {
            echo '<tr>';
        }

        // Check if the current date is within the reservation period
        $disabled = ($currentDate < time()) ? 'disabled' : '';

        // Output a table cell for each day
        echo '<td><label>';
        echo "<input type='radio' name='$inputName' value='" . date('Y-m-d', $currentDate) . "' $disabled>";
        echo "<span>$day</span></label></td>";

        // End the row at the end of each week
        if (date('w', $currentDate) == 6) {
            echo '</tr>';
        }
    }

    echo '</table>';
}
?>
