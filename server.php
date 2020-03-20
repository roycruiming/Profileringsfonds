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

             //Session ID zetten
             $query = "SELECT uID FROM users WHERE email='$email_1'";
             $result = mysqli_query($conn, $query);
             if(mysqli_num_rows($result) == 1){while($row = $result->fetch_assoc()){$_SESSION['id'] = $row['uID'];}}
             $_SESSION['success'] = $email_1 . " succesvol toegevoegd met wachtwoord " . $password;
             //header('location: index.php');
         }
     }
?>