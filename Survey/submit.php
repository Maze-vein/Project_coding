<?php
session_start();
require 'test_db.php';

// Retrieve survey responses
$responses = $_SESSION['responses'] ?? [];

// Convert response text to score
function getScore($response) {
    switch ($response) {
        case "Strongly Agree": return 5;
        case "Agree": return 4;
        case "Neutral": return 3;
        case "Disagree": return 2;
        default: return 1; // Catch-all (or "Strongly Disagree")
    }
}

// Calculate total and average
$totalScore = 0;
foreach ($responses as $response) {
    $totalScore += getScore($response);
}

$average = count($responses) ? $totalScore / count($responses) : 0;
$rounded = round($average);

// Smiley & star logic
$smileys = [1 => "😠", 2 => "🙁", 3 => "😐", 4 => "🙂", 5 => "😀"];
$smileyDisplay = $smileys[$rounded] ?? "❓";
$stars = str_repeat("⭐", $rounded);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/IT_logo.png" type="image/icon type">
    <style>
        body {
            font-family: Georgia, serif;
            background: url("img/TECH.jpg") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            padding: 50px 50px;
            border-radius: 15px;
            text-align: center;
            width: 400px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            color: white;
            box-shadow: 20px 20px 30px rgb(0, 0, 0);
        }

        h2 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .rating {
            font-size: 2rem;
            margin: 20px 0;
        }

        .back-home {
            margin-top: 40px;
        }

        .back-home a {
            padding: 10px 20px;
            background-color: rgb(16, 102, 96);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: 2px solid transparent;
            transition: 0.3s ease;
        }

        .back-home a:hover {
            color: #fff;
            border-color: #fff;
            background: rgba(255, 255, 255, 0.15);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🎉 Thank you for completing the survey!</h2>
        <p class="rating">
            Average Rating: <br>
            <?= $smileyDisplay ?><br>
            <?= $stars ?>
        </p>
        <div class="back-home">
            <a href="index.php">Back to Home</a>
        </div>
    </div>
</body>
</html>
