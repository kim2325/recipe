<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
require "db.inc.php";
$email = htmlspecialchars($_POST['email']);
$pwd = htmlspecialchars($_POST['psw']);

if(!empty($email) && !empty($pwd)) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
      //Valid email, no empty fields
      $sql = "SELECT * FROM userlist WHERE email=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        //SQL error
        exit();

      }
      else {
        //SQL success
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)) {
          //user exists
          $pwdcheck = password_verify($pwd, $row['password']);
          if ($pwdcheck == false) {
            //incorrect password
            echo 'incorrect password';
            exit();
          } else if ($pwdcheck == true) {
            //correct password
            echo 'Sign in successful';
            session_start();
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['userEmail'] = $row['email'];

            header("Location: ../index.php");
            exit();
          } else {
            //password check error
            exit();
          }

        } else {
          //No user associated with the email
          echo 'No user associated with given email';
          exit();
        }
      }


    } else {
      //Email invalid
      exit();
    }}
   else {
    //Empty fields
    exit();
  }
}
