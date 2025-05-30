<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "survey_db");

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Set headers to force download as CSV file
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=survey_responses.csv");
header("Pragma: no-cache");
header("Expires: 0");

// Open output stream
$output = fopen('php://output', 'w');

// Output column headers
fputcsv($output, [
    'ID', 'Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7', 'Q8',
    'Name', 'Contact Number', 'Government Office Name', 'Service Availed', 'Submitted At'
]);

// Fetch data
$sql = "SELECT * FROM responses ORDER BY submitted_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Prevent Excel from auto-formatting (e.g., large numbers, phone numbers, dates)
        $row['contact_number'] = "\t" . $row['contact_number'];
        $row['submitted_at'] = "\t" . $row['submitted_at'];

        fputcsv($output, [
            $row['id'], $row['q1'], $row['q2'], $row['q3'], $row['q4'],
            $row['q5'], $row['q6'], $row['q7'], $row['q8'],
            $row['name'], $row['contact_number'], $row['government_office_name'],
            $row['service_availed'], $row['submitted_at']
        ]);
    }
} else {
    fputcsv($output, ["No data available"]);
}

fclose($output);
$conn->close();
?>
