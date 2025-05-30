<?php
session_start();
session_destroy();
require 'test_db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BiTS SATISFACTION SURVEY</title>
  <link rel="icon" href="img/IT_logo.png" type="image/icon type">
 
</head>

<style>
    /* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  min-height: 100vh;
  background: url("img/TECH.jpg") center/cover no-repeat fixed, #000;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  overflow-x: hidden;
  
}


/* Title Section */
.title-absolute {
  position: absolute;
  top: 2rem;
  left: 50%;
  transform: translateX(-50%);
  text-align: center;
  z-index: 10;
  width: 100%;
  pointer-events: none;
  padding: 0 1rem;
}


.title-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
}


.title-logo {
  width: clamp(60px, 12vw, 110px);
  height: clamp(60px, 12vw, 110px);
  border: 4px solid rgba(8, 127, 148, 0.91);
  border-radius: 50%;
  object-fit: cover;
  background-color: white;
  box-shadow: 6px 7px 8px rgba(0, 0, 0, 0.7);
}


.floating-title {
  font-family: 'Montserrat', sans-serif;
  font-size: clamp(1rem, 4vw, 2.2rem);
  text-transform: uppercase;
  letter-spacing: 2px;
  font-weight: bold;
  color: transparent;
  -webkit-text-stroke: 1px #fff;
  background: url(img/back.png);
  -webkit-background-clip: text;
  background-clip: text;
  animation: scroll-background 20s linear infinite;
  backdrop-filter: blur(8px);
  box-shadow: 5px 5px 15px rgba(0, 0, 0, 1);
  padding: 10px 20px;
  border-radius: 8px;
  text-align: center;
}


@keyframes scroll-background {
  100% {
    background-position: 2000px 0;
  }
}


/* Container */
.container {
  margin-top:5px;
  width: 90%;
  max-width: 1000px;
  padding: 1.5rem;
  border-radius: 8px;
  text-align: center;
  backdrop-filter: blur(8px);
  background-color: rgba(0, 0, 0, 0.3);
  border: 2px solid rgba(123, 126, 126, 0.5);
  color: #fff;
  box-shadow: 20px 20px 30px rgb(0, 0, 0);
  }


.container h2{
    margin-top:25px;
    margin-bottom: 3px;
    font-family: Georgia, serif;
    color: #fff;
}


.container h3{
  margin-bottom: 0.5rem;
}

h4{
  color:#fff;
}
.container p{
    color:grey;
    font-size:13px;
    font-style: italic;
    margin-bottom: 10px;
}


/* Form */
form {
  padding: 1rem;
  max-width: 400px;
  margin: 0 auto;
  text-align: center;
  box-shadow: 5px 3px 3px 3px rgba(0, 0, 0, 0.7);
  border: 1px solid rgb(92, 95, 95);
  color: #f1f1f1; 
  font-family: Arial, sans-serif;
}

form h3 {
  margin-bottom: 0.5rem;
  text-transform: uppercase;
  color: #fff;
}

form p {
  color: #F1E9DB;
  margin-bottom: 1rem;

}

form div {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 1rem;
  justify-content: center;
}

label {
  font-size: 15px;
  color: #F1E9DB;
}

a {
  color: #00f;
  font-size: 15px;
  text-decoration: underline;
}

a:hover {
  color: grey;
}

/* Buttons */
     button {
            background: linear-gradient(135deg,rgb(1, 65, 57),rgb(9, 161, 141));
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

/*============= FOOTER ==============*/
.footer-scroll {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background: linear-gradient(to right, #003844, #005c63);
  padding: 12px 0;
  box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.5);
  z-index: 1000;
  overflow: hidden;
}

.scrolling-wrapper {
  display: flex;
  width: 200%;
  animation: scroll-left 25s linear infinite;
}

.scrolling-content {
  display: flex;
  flex-shrink: 0;
  width: 50%;
  justify-content: space-around;
}

.scroll-text {
  white-space: nowrap;
  margin-right: 50px;
  font-size: clamp(12px, 3vw, 16px);
  color: #fff;
  font-weight: 500;
  letter-spacing: 1px;
}

.star {
  font-size: 18px;
  color: gold;
  text-shadow: 0 0 5px gold;
  margin-left: 5px;
}

.welcome {
  font-size: 18px;
  color: white;
  text-shadow: 0 0 5px gold;
  margin-left: 5px;
}

.line{
  font-size: 18px;
  color: whitesmoke;
  text-shadow: 0 0 5px gold;
  margin-left: 5px;
}

@keyframes scroll-left {
  0% {
    transform: translateX(50%);
  }
  100% {
    transform: translateX(-50%);
  }
}


/* Responsive */
@media (max-width: 480px) {

  .floating-title {
    font-size: 1.1rem;
    white-space: normal;
  }

  .title-logo {
    width: 40px;
    height: 40px;
  }

  .title-wrapper {
    flex-direction: column;
  }

  .scroll-text {
    font-size: 10px;
  }

  .footer-scroll {
    padding: 7px 0;
  }

  .container {
    padding: 1rem;
    margin-top:3px;
  }

  form {
    width: 100%;
  }
}


</style>

<body>
  <div class="title-absolute">
    <div class="title-wrapper">
      <img src="img/IT_logo.png" alt="Logo" class="title-logo">
      <div class="floating-title">BAYAWAN INFORMATION TECHNOLOGY SECTION</div>
    </div>
  </div>

  <div class="container">
    <h2><span class="welcome">~~~~~~ ★</span> Welcome My Dear Client <span class="welcome">★ ~~~~~~</span></h2>
  <br>
    <h4>We at LGU-Bayawan City endeavors to consistently provide effective and efficient services to meet our client’s needs. 
        In this regard, may we request you to help us improve our services by allowing us to hear your voice.</h4> 
    <p>(Kami, sa Lokal na Pamahalaan ng Lungsod ng Bayawan ay lubos na nagsisikap upang patuloy na magbigay ng epektibo at
         mataas na kalidad na serbisyo upang matugunan ang mga pangangailangan ng aming mga kliyente. Sa bagay na ito, 
         aming hinihiling na kami ay iyong matulungan sa patuloy na pagpapabuti ng aming mga serbisyo sa pamamagitan ng 
         pag-papaalam sa amin ng inyong mga saloobin.) </p>
    <br>
   <h4>Kindly fill-up this survey form and reflect your impressions about our services and let us know your experience while transacting official business with us.
     Click the rating that corresponds to your satisfaction level and/or write your observations/comments.</h4>
    <p>(Kung maari lamang pong pakipunan itong Surbey at ilahad ang inyong masasabi sa aming naibigay na serbisyo. 
        E Click ang bilog na katumbas ng numero na tutugma sa inyong antas ng kasiyahan.) </p>

 <!--  <span class="line">~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~`~</span>   -->

  <form method="POST" action="question.php" onsubmit="return validateForm();">
  <h3>Agreement Confirmation</h3>
  <h4>Please read and accept the following policies to proceed with the survey.</h4> <br>

  <div>
    <input type="checkbox" id="privacyCheck" onclick="toggleSubmitButton();">
    <label for="privacyCheck">I agree to the </label>
    <a href="privacy.html" target="_blank" rel="noopener noreferrer">[Data Privacy and Policy]</a>
  </div>

  <div>
    <input type="checkbox" id="termsCheck" onclick="toggleSubmitButton();">
    <label for="termsCheck">I agree to the </label>
    <a href="terms.html" target="_blank" rel="noopener noreferrer">[Terms and Conditions]</a>
  </div>

  <button type="submit" name="submit" id="submitBtn">Start Survey</button>
</form>



  <script>
  function toggleSubmitButton() {
    const privacyChecked = document.getElementById('privacyCheck').checked;
    const termsChecked = document.getElementById('termsCheck').checked;
    document.getElementById('submitBtn').disabled = !(privacyChecked && termsChecked);
  }

  function validateForm() {
    const privacyChecked = document.getElementById('privacyCheck').checked;
    const termsChecked = document.getElementById('termsCheck').checked;

    if (!privacyChecked || !termsChecked) {
      alert ("Please agree to the Data Privacy and Policy and Terms and Conditions before proceeding.");
      return false;
    }

    return true; // Allow form submission
  }
</script>  
  </div>

<!-- =================== FOOTER ========================-->

  <div class="footer-scroll">
    <div class="scrolling-wrapper">
      <div class="scrolling-content">
        <span class="scroll-text"><span class="star">★</span> SERVICE BEYOND TECHNOLOGY <span class="star">★</span></span>
        <span class="scroll-text"><span class="star">★</span> BITS Customer Care <span class="star">★</span></span>
        <span class="scroll-text"><span class="star">★</span> BITS Network <span class="star">★</span></span>
        <span class="scroll-text"><span class="star">★</span> BITS Hardware <span class="star">★</span></span>
        <span class="scroll-text"><span class="star">★</span> BITS GIS <span class="star">★</span></span>
        <span class="scroll-text"><span class="star">★</span> BITS LFEWS <span class="star">★</span></span>
        <span class="scroll-text"><span class="star">★</span> WE ARE HAPPY TO SERVE YOU <span class="star">★</span></span>
        <span class="scroll-text"><span class="star">★</span> IBAYAW BAYAWAN!! <span class="star">★</span></span>
        <span class="scroll-text"><span class="star">★</span> KITA ANG BAYAWAN!! <span class="star">★</span></span>
      </div>

     
    </div>
  </div>
</body>
</html>
