<?php


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  require "db.inc.php";
$email = htmlspecialchars($_POST['email']);
$pwd = htmlspecialchars($_POST['psw']);
$pwdcheck = htmlspecialchars($_POST['psw-repeat']);

if(!empty($email) && !empty($pwd) && !empty($pwdcheck)) {
       if(filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
         if($pwd === $pwdcheck) {
           //All fields entered, valid email, password match
           $sql = "SELECT email from userlist WHERE email=?";
           $stmt = mysqli_stmt_init($conn);

           if(!mysqli_stmt_prepare($stmt, $sql)) {
             //SQL error
             echo 'SQL error';

             exit();
           } else {
             //SQL success
             mysqli_stmt_bind_param($stmt, "s", $email);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_store_result($stmt);
             $resultCheck = mysqli_stmt_num_rows($stmt);
             if($resultCheck > 0) {
               //Email is already associated with a login
               echo 'email in use';

               exit();
             } else {
               //No user already exists, create new userlist
               $sql = "INSERT INTO userlist (email, password) VALUES (?, ?)";
               $stmt = mysqli_stmt_init($conn);
               if (!mysqli_stmt_prepare($stmt, $sql)) {
                 //SQL error

                 exit();
               } else {
                 //no error
                 $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                 mysqli_stmt_bind_param($stmt, "ss", $email, $hashedpwd);
                 mysqli_stmt_execute($stmt);
                 //signup success
                 header("Location: ../index.php");
                 exit();
               }
              }
           }
          } else {
           //Password check failed
           echo 'Password fail';

           exit();
          }
      } else {
        //Not all fields entered
        echo 'Email failed';
        exit();
      }
    } else {
      echo 'Please enter all fields';
    }
}
