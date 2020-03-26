<?php
session_start();

//variable init
$errors = array();
$email_1 ="";
$email_2 ="";

//db variables
$host = 'localhost';
$name = 'root';
$pass = 'root';
$database = 'profileringsfonds';

    //verbinding met database + errormsg
    $conn = mysqli_connect($host, $name, $pass, $database);
    $query = "SELECT * FROM users";

     if(mysqli_connect_errno($conn)){
         echo "Kon geen verbinding maken met de database: " . mysqli_connect_error($conn);
         exit();
     }


     if(isset($_POST['register'])){
         //Haalt de emailadressen veilig uit de inputvelden
         $email_1 = mysqli_real_escape_string($conn, $_POST['email_1']);
         $email_2 = mysqli_real_escape_string($conn, $_POST['email_2']);

         //Als er fouten zijn push naar array
         if(empty($email_1)){array_push($errors,"E-mail moet ingevuld worden");}
         if(empty($email_2)){array_push($errors,"Bevestig e-mail moet ingevuld worden");}
         if($email_1 != $email_2){array_push($errors,"De e-mail adressen komen niet overeen");}

         //check of de gebruiker al bestaat, zo ja, push error naar array
         $user_check_query = "SELECT * FROM users WHERE email='$email_1' LIMIT 1";
         $result = mysqli_query($conn, $user_check_query);
         $user = mysqli_fetch_assoc($result);
         if ($user){array_push($errors, "Deze gebruiker bestaat al");}

         //wachtwoord hashen en gebruiker registeren als er geen errors zijn
         if(count($errors) == 0){
             //password gen
             function genPassword($length = 10) {
                 return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
             }
             $password = genPassword();
             $password_hashed = md5($password);
             $query = "INSERT INTO users (email, password) VALUES('$email_1', '$password_hashed')";
             mysqli_query($conn, $query);

             $_SESSION['reg'] = $email_1 . " succesvol toegevoegd met wachtwoord " . $password;
             $email_1 = "";
             $email_2 = "";
         }
         mysqli_close($conn);
     }

    //login
     if(isset($_POST['login_user'])){
         //sanitize input
         $email = mysqli_real_escape_string($conn, $_POST['email']);
         $password = mysqli_real_escape_string($conn, $_POST['password']);
         //errors als input leeg is
         if(empty($email)){array_push($errors, "Ongeldige gebruikersnaam");}
         if(empty($password)){array_push($errors, "Ongeldig wachtwoord");}

         if(count($errors) == 0){
             $password = md5($password);
             $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
             $result = mysqli_query($conn, $query);

             //als result maar 1 regel is(dus als er maar 1 account bestaat die aan de voorwarden voldoet)
             if(mysqli_num_rows($result) == 1){
                 while($row = $result->fetch_assoc()) {
                     $_SESSION['id'] = $row['uID'];
                     $_SESSION['type'] = $row['type'];
                     $_SESSION['user'] = $email;
                     $logincheck = $row['firstlogin'];

                     //check of je voor het eerst inlogt
                     if($logincheck == 1){
                         mysqli_close($conn);
                        header('location: changepassword.php');
                     }else{
                         header('location: index.php');
                         if(isset($_SESSION['type'])){
                             if($_SESSION['type'] == 1){
                                 mysqli_close($conn);
                                 $_SESSION['admin'] = true;
                             }
                        }
                     }
                 }
             } else {array_push($errors, "Account bestaat niet!");}
         } else {array_push($errors, "Ongeldige gebruikersnaam/wachtwoord combinatie");}
     }


     //wachtwoord veranderen
     if(isset($_POST['change_pass'])){
         $pass_1 = mysqli_real_escape_string($conn, $_POST['new_password_1']);
         $pass_2 = mysqli_real_escape_string($conn, $_POST['new_password_2']);

         //push errors
         if(empty($pass_1)){array_push($errors,"Wachtwoord is leeg");}
         if(empty($pass_2)){array_push($errors,"Bevestig wachtwoord is leeg");}
         if($pass_1 != $pass_2){array_push($errors,"De wachtwoorden komen niet overeen");}

         //wachtwoord hashen en updaten als er geen errors zijn
         if(count($errors) == 0){
             $pass = md5($pass_1);
             $id = $_SESSION['id'];
             $user =  $_SESSION['user'];
             $query = "UPDATE users SET password = '$pass', firstlogin = '0' WHERE uID = '$id' AND email = '$user'";
             mysqli_query($conn, $query);
             mysqli_close($conn);
             header('location: index.php');
         }
     }

?>