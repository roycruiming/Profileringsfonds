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


//registreren
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
        $_SESSION['reg'] = $email_1 . " succesvol toegevoegd met wachtwoord " . $password;
        $email_1 = "";
        $email_2 = "";
    }
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

             if(mysqli_num_rows($result) == 1){
                 while($row = $result->fetch_assoc()) {
                     $firstlogin = $row['firstlogin'];
                     if($firstlogin == 1){
                         $_SESSION['id'] = $row['uID'];
                         header('location: changepassword.php');
                     }
                     else{
                     $_SESSION['id'] = $row['uID'];
                     $_SESSION['type'] = $row['type'];
                     $_SESSION['user'] = $email;
                     header('location: index.php');}
                     if(isset($_SESSION['type'])){
                         if($_SESSION['type'] == 1){
                             $_SESSION['admin'] = true;
                         }
                     }
                 }
             }
         } else {array_push($errors, "Ongeldige gebruikersnaam/wachtwoord combinatie");}
     }



if(isset($_POST['submit_form'])){
    $snr = $_POST['studentnummer'];
    $l_name = $_POST['achternaam'];
    $f_name = $_POST['roepnaam'];
    $dob = $_POST['geboortedatum'];
    $address = $_POST['adres'];
//    $f_name = $_POST[''];
//    $f_name = $_POST[''];
//    $f_name = $_POST[''];
//    $f_name = $_POST[''];
//    $f_name = $_POST[''];
//    $f_name = $_POST[''];

    require ('C:\wamp64\bin\apache\apache2.4.41\htdocs\fpdf.php');

    $pdf = new FPDF();

    $pdf->AddPage();

    $pdf->SetFont("Arial", "B",16);

    $pdf->Cell(0,10,"$f_name's formulier", 1, 1,'C');

    $pdf->Cell(50,10,"Studentnummer: ",1,0);
    $pdf->Cell(65,10,$snr,1,1);

    $pdf->Cell(50,10,"Achternaam: ",1,0);
    $pdf->Cell(65,10,$l_name,1,1);

    $pdf->Cell(50,10,"Roepnaam: ",1,0);
    $pdf->Cell(65,10,$f_name,1,1);

    $pdf->Cell(50,10,"Geboortedatum: ",1,0);
    $pdf->Cell(65,10,$dob,1,1);

    $pdf->Cell(50,10,"Adres: ",1,0);
    $pdf->Cell(65,10,$address,1,1);

    $id = $_SESSION['id'];
    $user = $_SESSION['user'];
    $fullpath = "C:/wamp64/www/Projects/Profileringsfonds/public_html/".$id.".pdf";
    $dbpath = "/Projects/Profileringsfonds/public_html/".$id.".pdf";
    if(!empty($id)){
        $pdf->Output("$fullpath","F");
        $query = "INSERT INTO formulier (path, uID, uName) VALUES('$dbpath', '$id', '$user')";
        mysqli_query($conn, $query);
    }


}


if (isset($_POST['change_pass'])){
    $current_pass = mysqli_real_escape_string($conn, $_POST['current_pass']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['new_password_1']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['new_password_2']);

    //Als er fouten zijn push naar array
    if(empty($current_pass)){array_push($errors,"Huidig wachtwoord moet ingevuld worden");}
    if(empty($pass1)){array_push($errors,"Nieuw wachtwoord moet ingevuld worden");}
    if(empty($pass2)){array_push($errors,"Bevestig wachtwoord moet ingevuld worden");}
    if($pass1 != $pass2){array_push($errors,"De twee wachtwoorden komen niet overeen");}
    if($current_pass == $pass1 || $current_pass == $pass2){array_push($errors, "U moet een nieuw wachtwoord invoeren");}
    $id = $_SESSION['id'];
    if(count($errors) == 0){
        $password = md5($current_pass);
        $query = "SELECT * FROM users WHERE password='$password' AND uID = '$id'";
        $result1 = mysqli_query($conn, $query);

        if(mysqli_num_rows($result1) == 1){
            $new_pass = md5($pass1);
            $query = "UPDATE users SET password = '$new_pass', firstlogin = '0' WHERE password='$password' AND uID = '$id'";
            mysqli_query($conn, $query);
            while($row = $result1->fetch_assoc()) {
                    $_SESSION['id'] = $row['uID'];
                    $_SESSION['type'] = $row['type'];
                    $_SESSION['user'] = $row['email'];
            }header('location:index.php');
        }
    }

}






?>