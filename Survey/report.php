<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "survey_db");

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Fetch all records from the responses table
$sql = "SELECT * FROM responses ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Survey Responses Report</title>
    <link rel="icon" href="img/IT_logo.png" type="image/icon type">
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: url("img/TECH.jpg") center/cover no-repeat fixed;
    margin: 0;
    padding: 30px;
    overflow: hidden;
    color: #333;
}

h2 {
    text-align: center;
    color: white;
    font-size: 2.5rem; /* Larger heading */
    letter-spacing: 2.5px;
    padding: 20px;
    margin-bottom: 30px;
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
    border-radius: 12px;
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
    background: white;
    text-align: center;
    font-size: 1.1rem; /* Increased font size */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    border: 1px solid #ccc;
    padding: 9px;
    font-size: 1.1rem; /* Slightly larger text */
}

th {
    background-color: #006666;
    color: white;
    position: sticky;
    top: 0;
    z-index: 1;
    font-size: 1.1rem;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.export-button {
    text-align: right;
    margin-bottom: 20px;
}

.export-button button {
    background-color: #006666;
    color: white;
    padding: 12px 20px;
    border: none;
    cursor: pointer;
    font-size: 1.1rem;
    border-radius: 6px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.export-button button:hover {
    background-color: #004d4d;
    transform: scale(1.05);
}

    </style>
</head>
<body>

<h2>Survey Responses</h2>

<div class="export-button">
    <form action="export.php" method="post">
        <button type="submit">Export to Excel</button>
    </form>
</div>

<?php
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Q1</th>
                <th>Q2</th>
                <th>Q3</th>
                <th>Q4</th>
                <th>Q5</th>
                <th>Q6</th>
                <th>Q7</th>
                <th>Q8</th>
                <th>Government Office Name</th>
                <th>Client Name</th>
                <th>Service Availed</th>
                <th>Contact Number</th>
                <th>Date of Service Completion</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['q1']) . "</td>
                <td>" . htmlspecialchars($row['q2']) . "</td>
                <td>" . htmlspecialchars($row['q3']) . "</td>
                <td>" . htmlspecialchars($row['q4']) . "</td>
                <td>" . htmlspecialchars($row['q5']) . "</td>
                <td>" . htmlspecialchars($row['q6']) . "</td>
                <td>" . htmlspecialchars($row['q7']) . "</td>
                <td>" . htmlspecialchars($row['q8']) . "</td>
                <td>" . htmlspecialchars($row['government_office_name']) . "</td>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['service_availed']) . "</td>
                <td>" . htmlspecialchars($row['contact_number']) . "</td>
                <td>" . htmlspecialchars($row['submitted_at']) . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No survey responses found.</p>";
}

$conn->close();
?>
</body>
</html>
