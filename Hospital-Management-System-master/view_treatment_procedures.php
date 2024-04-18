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

    // Fetch treatment procedure data from the database
    $sql = "SELECT * FROM TreatmentProcedures";
    $result = $conn->query($sql);

    // Check if there are any treatment procedure records
    if ($result->num_rows > 0) {
        // Output table headers
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Hospital ID</th>";
        echo "<th>Procedure ID</th>";
        echo "<th>Patient ID</th>";
        echo "<th>Doctor ID</th>";
        echo "<th>Procedure Type</th>";
        echo "<th>Procedure Date</th>";
        echo "<th>Procedure Description</th>";
        echo "<th>Procedure Cost</th>";
        echo "<th>Discharge Date</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["hospital_id"] . "</td>";
            echo "<td>" . $row["procedure_id"] . "</td>";
            echo "<td>" . $row["patient_id"] . "</td>";
            echo "<td>" . $row["doctor_id"] . "</td>";
            echo "<td>" . $row["procedure_type"] . "</td>";
            echo "<td>" . $row["procedure_date"] . "</td>";
            echo "<td>" . $row["procedure_description"] . "</td>";
            echo "<td>" . $row["procedure_cost"] . "</td>";
            echo "<td>" . $row["discharge_date"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo '<div id="noProcedures" class="error-message">No treatment procedures found</div>';
    }

    $conn->close();
?>