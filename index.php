<?php 
session_start();
$pesan = "";

if (!empty($_POST['input'])) {
    $pesan = ($_POST['input'] == $_SESSION['captcha']) ? "Captcah successfully verified." : "Captcha doesn't match.";
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Speed Test | PHP Captcha</title>
 </head>
 <body style="background: #eee;">
     <h2>PHP Captcha Verification</h2>
     <h4><?= $pesan; ?></h4>
     <img src="captcha.php">
     <form action="" method="post">
        <input type="text" name="input" required oninput="this.value=this.value.toUpperCase()"><button type="submit">Submit</button>
        <div>*the default captcha code is uppercase.</div>
     </form>
 </body>
 </html>