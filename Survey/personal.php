<?php
session_start();
require 'test_db.php'; // Ensure this file has your DB connection logic

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect personal info
    $name = $_POST['name'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';
    $sex = $_POST['sex'] ?? '';
    $client_type = $_POST['client_type'] ?? '';
    $government_office_name = $_POST['government_office_name'] ?? '';
    $service_availed = $_POST['service_availed'] ?? '';
    $office_transacted = $_POST['office_transacted'] ?? '';
    $suggestion = $_POST['suggestion'] ?? '';
    $responses = $_SESSION['responses'] ?? [];

    if (count($responses) < 8) {
        die("❌ Error: Not all 8 responses submitted.");
    }

    // Connect to database
    $conn = new mysqli("localhost", "root", "", "survey_db");
    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO responses (q1, q2, q3, q4, q5, q6, q7, q8, name, contact_number, sex, client_type, government_office_name, service_availed, office_transacted, suggestion) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("❌ Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssssssssssssss",
        $responses[0], $responses[1], $responses[2], $responses[3],
        $responses[4],  $responses[5], $responses[6], $responses[7], 
        $name, $contact_number, $sex,
        $client_type,  $government_office_name, $service_availed, $office_transacted, $suggestion
    );

    if ($stmt->execute()) {
        header("Location: submit.php");
        exit();
    } else {
        die("❌ Execute failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/IT_logo.png" type="image/icon type">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: url("img/TECH.jpg") center/cover no-repeat fixed;
        }

        .container {
            padding: 30px;
            border-radius: 15px;
            width: 800px;
            max-width: 95%;
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            box-shadow: 6px 7px 8px rgb(5, 1, 1);
            color: white;
        }

        h2 {
            text-align: center;
            margin-top: 0;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin-top: 30px;
        }

        .column {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .form-group1, .form-group2 {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            width: 100%;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input, select, textarea {
            padding: 8px;
            margin-bottom: 15px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        button {
            background: linear-gradient(135deg, #14b8a6, #2dd4bf);
            border: none;
            color: white;
            cursor: pointer;
            padding: 12px 25px;
            font-size: 16px;
            margin-top: 20px;
            border-radius: 15px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            font-weight: bold;
            letter-spacing: 1px;
        }
        button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.5);
         }


        button:hover {
            transform: scale(1.03);
            background: linear-gradient(135deg, #0f766e, #0891b2);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
         }


        /* Responsive Design */
        @media (max-width: 599px) {
            .container {
                padding: 15px;
            }

            h2 {
                font-size: 20px;
            }

            input, select, textarea {
                font-size: 14px;
                padding: 6px;
            }

            label {
                font-size: 14px;
            }

            .form-row {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Please Enter Your Details</h2>

    <form method="POST" action="personal.php">
        <div class="form-row">
            <div class="column">
                <label for="name">Name *:</label>
                <input type="text" name="name" id="name" required>

                <label for="contact_number">Contact Number *:</label>
                <input type="text" name="contact_number" id="contact_number" required>

                <label for="government_office_name">Government Office Name *:</label>
                <input type="text" name="government_office_name" id="government_office_name" required>
            </div>

            <div class="column">
                <label for="sex">Sex *:</label>
                <select name="sex" id="sex" required>
                    <option value="">-- Select --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>

                <label for="client_type">Client Type *:</label>
                <select name="client_type" id="client_type" required>
                    <option value="">-- Select --</option>
                    <option value="Citizen">Citizen</option>
                    <option value="Business">Business</option>
                    <option value="Government">Government (Employee or Another Agency)</option>
                </select>

                <!-- Uncomment the region selector if needed -->
                <!--
                <label for="region">Region *:</label>
                <select name="region" id="region" required>
                    <option value="">-- Select --</option>
                    <option value="NIR - Negros Island Region">NIR - Negros Island Region</option>
                    ... other regions ...
                </select>
                -->
                
                <label for="office_transacted">Person/Unit/Office Transacted With *:</label>
                <select name="office_transacted" id="office_transacted" required>
                    <option value="">-- Select --</option>
                    <option value="BITS NETWORK">BITS NETWORK</option>
                    <option value="BITS CUSTOMER CARE">BITS CUSTOMER CARE</option>
                    <option value="BITS HARDWARE">BITS HARDWARE</option>
                    <option value="BITS LFEWS">BITS LFEWS</option>
                    <option value="BITS GIS">BITS GIS</option>
                </select>
            </div>
        </div>

        <div class="form-group2">
            <label for="service_availed">Service Availed *:</label>
            <input type="text" name="service_availed" id="service_availed" required>

            <label for="suggestion">Suggestions on how we can improve our services (optional):</label>
            <input type="text" name="suggestion" id="suggestion">
        </div>

        <button type="submit" name="submit">Finish Survey</button>
    </form>
</div>
</body>
</html>
