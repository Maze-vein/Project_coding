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
    <title>ALL Responses</title>
    <link rel="icon" href="img/IT_logo.png" type="image/icon type">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 30px;
            background: url("img/TECH.jpg") center/cover no-repeat fixed;
        }
        h2 {
            text-align: center;
            color:white;
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.7);
            font-size:200%;
            backdrop-filter: blur(8px);
            letter-spacing: 2px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background: white;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #006666;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>All Survey Responses</h2>

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
                <th>Name</th>
                <th>Contact</th>
                <th>Goverment Office Name</th>
                <th>Service Availed</th>
                <th>Submitted At</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['q1']}</td>
                <td>{$row['q2']}</td>
                <td>{$row['q3']}</td>
                <td>{$row['q4']}</td>
                <td>{$row['q5']}</td>
                <td>{$row['q6']}</td>
                <td>{$row['q7']}</td>
                <td>{$row['q8']}</td>
                <td>{$row['name']}</td>
                <td>{$row['contact_number']}</td>
                <td>{$row['government_office_name']}</td>
                <td>{$row['service_availed']}</td>
                <td>{$row['submitted_at']}</td>
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

