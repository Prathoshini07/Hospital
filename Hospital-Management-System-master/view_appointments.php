<?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch appointment data from the database
    $sql = "SELECT * FROM appointment";
    $result = $conn->query($sql);

    // Check if there are any appointment records
    if ($result->num_rows > 0) {
        // Output table headers
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Appointment ID</th>";
        echo "<th>Patient ID</th>";
        echo "<th>Doctor ID</th>";
        echo "<th>Time</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["app_id"] . "</td>";
            echo "<td>" . $row["pid"] . "</td>";
            echo "<td>" . $row["doc_id"] . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo '<div id="noAppointments" class="error-message">No appointments found</div>';
    }

    $conn->close();
?>