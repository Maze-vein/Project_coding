<?php
session_start();
require 'test_db.php';



// Define all survey questions once at the beginning
$questions = [
    "1. Responsiveness: The Service was willingly and promptly extended to the clients/customer. (Maagap na naibigay ang serbisyo sa kliyente.)",
    "2. Reliability: Performed the service within the expectations of the client/customer served. (Naisagawa ang serbisyo ayon sa inaasahan ng kliyente.)",
    "3. Access & Facilities: Facilities/resources/modes of technology were readily available for convenient transactions. (May maayos at angkop na pasilidad at sistema para sa serbisyo.)",
    "4. Communication: Facilities / resources / modes of technology were readily available for convenient transactions. (May maayos at angkop na pasilidad at sistema para sa serbisyo.)",
    "5. Costs: Value for money spent on services rendered. (Tama ang kaukulang bayad para sa serbisyo o iba pang gastos para sa transaction.)",
    "6. Integrity: Provided services with high morale and spirit of honesty. (Naglingkod nang may katapatan at mataas na integridad.)",
    "7. Assurance: The service was provided by competent personnel. (Naibigay ang serbisyo nang may sapat na kakayahan at kaalaman.)",
    "8. Outcome: The overall expectations of the client are met. (Nakamit ang kabuuang serbisyong inaasahan.)",
];

// Save questions into session (only once)
if (!isset($_SESSION['questions'])) {
    $_SESSION['questions'] = $questions;
    $_SESSION['responses'] = [];
    $_SESSION['current'] = 0;
}

$current = $_SESSION['current'];
$totalQuestions = count($_SESSION['questions']);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['response'])) {
        $_SESSION['responses'][$current] = $_POST['response'];
    }

    if (isset($_POST['next'])) {
        $_SESSION['current']++;
    } elseif (isset($_POST['back']) && $_SESSION['current'] > 0) {
        $_SESSION['current']--;
    }

    // Redirect to same page to update question
    header("Location: question.php");
    exit();
}

// Redirect to personal info after last question
if ($_SESSION['current'] >= $totalQuestions) {
    header("Location: personal.php");
    exit();
}

$question = $_SESSION['questions'][$_SESSION['current']];
?>

<!-- HTML part here like before -->
<!DOCTYPE html>
<html>
<head>
<title>SERVICE DIMENSIONS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/IT_logo.png" type="image/icon type">
</head>
<style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100%;
            padding: 0 10px;
            background: url("img/TECH.jpg") center/cover no-repeat fixed;
            margin: 0;
            overflow: hidden;
        }

        .question-box{
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.7);
            padding: 10px  1.0rem;
            text-align: center;
            justify-content:center;
            background: linear-gradient(135deg,rgb(6, 73, 104),rgb(9, 161, 141));
        }
        .form-container {
            border: 1px solid rgba(255, 255, 255, 0.5);
             backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-radius: 16px;
            padding: 20px 90px;
            max-width: 500px;
            width: 100%;
            margin: auto;
            text-align: center;
            box-shadow: 20px 20px 30px rgb(0, 0, 0);
        }
        h4{
            color:#fff;
        }

        .form-container h2 {
            color: #fff;
            margin-bottom: 10px;
            font-size: 25px;
            text-align: justify;

            font-family: 'Garamond', sans-serif;;
        }

        .form-container p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .progress {
            font-size: 18px;
            font-weight: bold;
            color:rgb(6, 135, 139);
            margin-bottom: 10px;
        }

        .smileys {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: nowrap;
            margin-top: 20px;
            gap: 10px;
        }

        .smileys label {
            flex: 1;
            cursor: pointer;
            text-align: center;
        }

        .emoji-container {
            background-color: #fff; /* Light background */
            border: 2px solid #ccc;
            border-radius: 12px;
            padding: 15px 10px;
            height: 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .emoji-container:hover{
            background: linear-gradient( 135deg,  rgb(5, 101, 145), rgb(10, 253, 241));
        }
        .smileys input[type="radio"]:checked + .emoji-container {
            background-color:rgb(6, 135, 139);
            background: linear-gradient( 135deg,    rgb(5, 101, 145), rgb(10, 253, 241));
        }

        .emoji-container span {
            font-size: 14px;
            margin-top: 8px;
            color: #333;
            font-weight:bold;
        }

     
        .smileys input[type="radio"]:checked + .emoji-container {
            border-color:rgb(6, 135, 139);
            background-color:rgb(8, 199, 247);
        }

        button {
            background-color:rgb(16, 102, 96);
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            margin: 10px 5px;
            cursor: pointer;
            border-radius: 3px;
            font-size: 16px;
            border: 1px solid transparent;
            transition: 0.3s ease;
        }

        button:hover {
            color: #fff;
            border-color: #fff;
            background: rgba(255, 255, 255, 0.15);
        }

        button[name="end"] {
            background-color: #e74c3c;
        }

        button[name="end"]:hover {
            background-color: #c0392b;
        }

        @media (max-width: 768px) {
    .form-container {
        padding: 20px 30px;
        width: 100%;
    }

    .emoji-container {
        padding: 10px 5px;
        font-size: 22px;
        height: auto;
    }

    .emoji-container span {
        font-size: 12px;
    }

    .smileys {
        flex-wrap: wrap;
        gap: 15px;
    }

    button {
        width: 100%;
        margin: 5px 0;
    }
}

@media (max-width: 480px) {
    .form-container {
        padding: 15px 15px;
    }

    h4, .form-container h2, .form-container p {
        font-size: 16px;
    }

    .emoji-container {
        font-size: 18px;
    }

    .emoji-container span {
        font-size: 11px;
    }
}


    </style>
<body>
<div class="form-container">
    
<h4>SERVICE DIMENSIONS <?= $current + 1 ?> of <?= $totalQuestions ?></h4>

    <div class="question-box">
        <h2><?= $question ?></h2>
    </div>
    <form method="POST" id="surveyForm">
        <div class="smileys">
            <?php
            $smileyOptions = [
              'Strongly Agree' => '😄',
              'Agree'          => '🙂',
              'Neutral'        => '😐',
              'Disagree'       => '🙁',
              'Strongly Disagree'  => '😠',
            ];
            foreach ($smileyOptions as $label => $emoji) {
                echo '<label>';
                echo "<input type='radio' name='response' value='$label' >";
                echo "<div class='emoji-container'>$emoji<br><span style='font-size:14px;'>$label</span></div>";
                echo '</label>';
            }
            ?>
        </div>
        <div style="margin-top: 20px;">
            <?php if ($current > 0): ?>
                <button name="back">Back</button>
            <?php endif; ?>
            <button name="next">Next</button>
        </div>

</div>
        <script>
        document.getElementById('surveyForm').addEventListener('submit', function(e) {
            let activeButton = document.activeElement.name;

            if (activeButton === "next") {
                let radios = document.querySelectorAll('input[name="response"]');
                let oneChecked = Array.from(radios).some(r => r.checked);

                if (!oneChecked) {
                    e.preventDefault();
                    alert('Please select an option before proceeding.');
                }
            }
        });
        </script>
    </form>


</body>
</html>
